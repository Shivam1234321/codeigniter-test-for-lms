<?php
  $config = array(
    
    'adminlogin' => array(
                      array(
                         'field' => 'email',
                         'label' => 'Email',
                         'rules' => 'required|xss_clean|valid_email',
                         'errors' => array(
                             'required' => "Enter %s",
                             'valid_email' => 'Enter Valid %s'
                         ), 
                      ),
                      array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|xss_clean',
                        'errors' => array(
                            'required' => "Enter %s"
                        ), 
                     ),
            ),
    'admincp'       =>array(
                      array(
                          'field' => 'opass',
                          'label' => 'Old Password',
                          'rules' => 'required|xss_clean'
                      ),
                      array(
                          'field' => 'npass',
                          'label' => 'New Password',
                          'rules' => 'required|xss_clean',
                      ),
                      array(
                          'field' => 'cpass',
                          'label' => 'Confirm Password',
                          'rules' => 'required|xss_clean|matches[npass]',
                      ),
                ),
    'category'      =>array(
                       array(
                          'field' => 'name',
                          'label' => 'Name',
                          'rules' => 'required|xss_clean',
                          'errors' => array(
                            'required' => "Enter %s"
                          ),
                       ),
                       array(
                          'field' => 'description',
                          'label' => 'Description',
                          'rules' => 'required|xss_clean',
                          'errors' => array(
                            'required' => "Enter %s"
                          ),
                       ), 
                ),							
			
	'topper'      =>array(
					array(
						'field' => 'category',
						'label' => 'Category',
						'rules' => 'required|xss_clean',
						'errors' => array(
							'required' => "Enter %s"
						),
					),
					array(
						'field' => 'name',
						'label' => 'Name',
						'rules' => 'required|xss_clean',
						'errors' => array(
							'required' => "Enter %s"
						),
					),
					array(
						'field' => 'description',
						'label' => 'Description',
						'rules' => 'required|xss_clean',
						'errors' => array(
							'required' => "Enter %s"
						),
					), 
		), 	
	'change_password'  => array(
							array(
								'field' => 'old_password',
								'label' => 'OLD Password',
								'rules' => 'required|trim|xss_clean',
								'errors' => [
									'required' => "Select %s"
								]
							),
							array(
								'field' => 'new_password',
								'label' => 'New Password',
								'rules' => 'required|trim|xss_clean|min_length[8]',
								'errors' => [
									'required' => "Select %s"
								]
							),
							array(
								'field' => 'confirm_password',
								'label' => 'Confirm Password',
								'rules' => 'required|trim|xss_clean|min_length[8]|matches[new_password]',
								'errors' => [
									'required' => "Select %s"
								]
							),
		),

  );
?>
