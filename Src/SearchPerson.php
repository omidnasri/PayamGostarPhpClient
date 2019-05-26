<?php

    /**
     * Target: SearchPerson
     *
     * Authors: Omid Nasri
     * 
     * Description: A simple solution to search and find the person.
     * 
     * Version: 1.0
     */

    try
    {
        // Enter the field with the username and password that has the necessary permission to find the person.
        $username = 'admin';
        $password = 'admin';
        
        // Replace <url> keyword to your CRM host address.
        $url = 'http(s)://<url>/services/api/IPerson.svc?wsdl';
        
        // Create new instance of SoapClient to call SearchPerson method.
        $soapClient = new SoapClient( $url );
        
        $params = array(
            'username' => $username,
            'password' => $password,
            'typeKey' => 'defaultIdentity',
            'query' => 'CustomerNo="1025666"'
        );
        
        // Calling the SearchPerson method.
        $Result = $soapClient->SearchPerson( $params );
        
        // Checked that the operation was successful or not.
        if ($Result->SearchPersonResult->Success)
        {
            //Converting Object to JSON type then print output vlaue.
            echo json_encode($Result, JSON_UNESCAPED_UNICODE);
        }
        else 
            echo $Result->SearchPersonResult->Message;
    }
    catch ( Exception $e ) 
    {
        // Print exception message
        echo $e->getMessage();
    }

?>