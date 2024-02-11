# Project (Doctor, Patient Appointment Application)

PHP based web application built with  [CakePHP](http://www.cakephp.org) framework version 3.x

## Installation
1. Clone the repo from GitHub

    ```
    git clone https://github.com/nabinem/cakephp-test.git
    ```
2. Create mysql database named doc_patient_test
 
    ```
    Import database file doc_patient_test.sql located at root directory of this projects
    ```
    Make sure logs and tmp folders are writable
3. Test credentials

   ```
    For Patient Role:
        username: patient, password: patient

    For Doctor Role:
        username: doctor, password: doctor

    For Admin Role:
        username: admin, password: admin
   ```
4. Patient can sign up
   Doctor and Patient can also be added by admin from backend

5. Features

 - Patient can set appointment, delete appointment, he can only manage his appointments, whenever he sets appointment Email will be sent to doctor to whim he requested appointment.
 
 - Doctor can see all his appointments requested by various patients, he can confirm/postpone appointments, Whenever he confirms appointment notification email will be sent to patient whoever requested appointment.

6 . Some Screenshots
##### LogIn
![LogIn](http://i.imgur.com/yzIzqoq.png)

##### Dashboard
![Dashboard](http://i.imgur.com/yxn3VYD.png)

##### Appointment pages
![Appt1](http://i.imgur.com/Z6Uy4uJ.png)

![Appt2](http://i.imgur.com/ciKHmZR.png)


