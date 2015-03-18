<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\customer\CustomerRecord;
use app\models\customer\PhoneRecord;
use app\models\customer\Customer;
use app\models\customer\Phone;

class CustomersController extends Controller
{
    public function behaviors() {
        return [
            'rules' => [
                [
                    'actions' => ['add'],
                    'roles' => ['manager'],
                    'allow' => true
                ],
                [
                    'actions' => ['index', 'query'],
                    'roles' => ['user'],
                    'allow' => true,
                ]
            ],
        ];
    }
    
    public function actionIndex()
    {
        //get customer
        $customer = $this->findRecordsByQuery();
        //render view index
        return $this->render('index', compact('customer'));
    }

    public function actionAdd()
    {
        $customerRecord = new CustomerRecord();
        $phoneRecord = new PhoneRecord();

        $request = \Yii::$app->request;
        if ($this->load($customerRecord, $phoneRecord, $request->post()) && $request->isPost) {
            //get customer object
            $customer = $this->getCustomer($customerRecord, $phoneRecord);

            //save customer to db
            $this->saveCustomer($customer);

            //set flash data
            $session = \Yii::$app->session;
            $session->setFlash('message', 'Add customer successfully');

            //redirect to index page
            $this->redirect(Url::home() . 'customers');
        }

        return $this->render('add', compact('customerRecord', 'phoneRecord'));
    }

    public function actionQuery()
    {
        return $this->render('query');
    }


    /**
     * ------------------------------------------------
     * Translate layer between Yii and domain model
     * ------------------------------------------------
     */

    /**
     * Save customer info
     * @param Customer $customer
     */
    private function saveCustomer(Customer $customer)
    {
        $customerRecord = new CustomerRecord();
        $customerRecord->name = $customer->name;
        $customerRecord->birth_date = $customer->birth_date;
        $customerRecord->notes = $customer->notes;

        $customerRecord->save();

        //create phone
        foreach ($customer->phones as $phone) {
            $phoneRecord = new PhoneRecord();
            $phoneRecord->number = $phone->number;
            $phoneRecord->customer_id = $customerRecord->id;
            $phoneRecord->save();
        }
    }

    /**
     * Get customer information to object from active record
     * @param CustomerRecord $customerRecord
     * @param PhoneRecord $phoneRecord
     * @return Customer
     */
    private function getCustomer(CustomerRecord $customerRecord, PhoneRecord $phoneRecord)
    {
        $customer = new Customer($customerRecord->name, $customerRecord->birth_date);
        $customer->notes = $customerRecord->notes;

        $customer->phones[] = new Phone($phoneRecord->number);

        return $customer;
    }


    /**
     * load data form $_POST request and validate data in active record
     * @param CustomerRecord $customerRecord
     * @param PhoneRecord $phoneRecord
     * @param array $post
     * @return bool
     */
    private function load(CustomerRecord $customerRecord, PhoneRecord $phoneRecord, array $post)
    {
        return $customerRecord->load($post)
            and $phoneRecord->load($post)
            and $customerRecord->validate()
            and $phoneRecord->validate(array('number'));
    }

    /**
     * get record by query and wrap into ArrayDataProvider to using ListView widget
     * @return ArrayDataProvider
     */
    private function findRecordsByQuery()
    {
        //get number from $_GET request
        $number = \Yii::$app->request->get('phone_number');

        //get customers by number
        $customers = $this->getCustomersByPhone($number);

        //wrap customers into dataProvider
        $dataProvider = new ArrayDataProvider(
            array(
                'allModels' => $customers,
                'pagination' => false
            )
        );

        return $dataProvider;
    }

    /**
     * get customer info by number phone
     * @param $number
     * @return array
     */
    private function getCustomersByPhone($number)
    {
        $result = array();
        //get phone by number
        $phoneRecord = PhoneRecord::findOne(array('number' => $number));
        //get customer by phone
        if ($phoneRecord) {
            $customerRecord = CustomerRecord::findOne($phoneRecord->customer_id);
            if ($customerRecord) {
                $result[] = $this->getCustomer($customerRecord, $phoneRecord);
            }
        }

        //return result
        return $result;
    }
}