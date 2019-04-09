<?php

$config = array(
        'login_rule' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]'
                ),
                
        ),

        'user_form' => array(

                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone',
                        'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'Gender',
                        'rules' => 'trim|required'
                ),

        ),

        'contact_form'=> array(

                array(
                        'field' => 'username',
                        'label' => 'username',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone',
                        'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
                ),
                array(
                        'field' => 'message',
                        'label' => 'message',
                        'rules' => 'trim|required'
                ),    
        ),

        'forget_email'=>array(

                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                ),
        ),
);
?>