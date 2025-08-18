 PASS  Tests\Unit\ExampleTest
  ✓ that true is true                                                    0.02s  

   PASS  Tests\Unit\USerTest
  ✓ example                                                              0.01s  

   PASS  Tests\Feature\Auth\AuthenticationTest
  ✓ login screen can be rendered                                         0.32s  
  ✓ users can authenticate using the login screen                        0.08s  
  ✓ users can not authenticate with invalid password                     0.23s  
  ✓ users can logout                                                     0.02s  

   PASS  Tests\Feature\Auth\EmailVerificationTest
  ✓ email verification screen can be rendered                            0.02s  
  ✓ email can be verified                                                0.02s  
  ✓ email is not verified with invalid hash                              0.02s  

   PASS  Tests\Feature\Auth\PasswordConfirmationTest
  ✓ confirm password screen can be rendered                              0.02s  
  ✓ password can be confirmed                                            0.02s  
  ✓ password is not confirmed with invalid password                      0.22s  

   PASS  Tests\Feature\Auth\PasswordResetTest
  ✓ reset password link screen can be rendered                           0.02s  
  ✓ reset password link can be requested                                 0.24s  
  ✓ reset password screen can be rendered                                0.22s  
  ✓ password can be reset with valid token                               0.24s  

   PASS  Tests\Feature\Auth\RegistrationTest
  ✓ registration screen can be rendered                                  0.02s  
  ✓ new users can register                                               0.02s  

   PASS  Tests\Feature\DashboardTest
  ✓ guests are redirected to the login page                              0.02s  
  ✓ authenticated users can visit the dashboard                          0.02s  

   PASS  Tests\Feature\ExampleTest
  ✓ it returns a successful response                                     0.02s  

   PASS  Tests\Feature\Settings\PasswordUpdateTest
  ✓ password can be updated                                              0.02s  
  ✓ correct password must be provided to update password                 0.02s  

   PASS  Tests\Feature\Settings\ProfileUpdateTest
  ✓ profile page is displayed                                            0.02s  
  ✓ profile information can be updated                                   0.02s  
  ✓ email verification status is unchanged when the email address is un… 0.02s  
  ✓ user can delete their account                                        0.02s  
  ✓ correct password must be provided to delete account                  0.02s  

  Tests:    28 passed (65 assertions)
  Duration: 2.25s


   FOOTHOLD:
   - Test Conducted Informations:
   Date: 8/17/2025
   commit: 1613d7ca5a416cc69e88c37c535dfd2591aae381

   - Tested features are following:
   [
   Init Testing,
   AuthenticationTest,
   EmailVerificationTest,
   PasswordConfirmationTest,
   PasswordResetTest,
   RegistrationTest,,
   PasswordUpdateTest,
   ProfileUpdateTest,
   ]


