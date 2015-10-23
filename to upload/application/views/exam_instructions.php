<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <div class="home_steps well text-justify noborder">
                    <h2>Steps to be followed</h2>
                    <br>
                    
                    <h3>Students</h3>
                    <ol>
                        <li>For new registration, click on the 'STUDENT' link in the bottom of login panel.</li>
                        <li>In Step 1, Your will find the following columns ie., Enter Admission Number Enter Security Code,    College Name. So Enter valid admission number and security code which is sent to you mail id.</li>

                        <li>In Step 2, 1-9 rows come by default according to your admission number which is entered by your college/department. Now you have to enter from 10-32 rows ie., 10   Degree Type*,   11  Eligibility Qualification*, 12  Gender, 13  Nationality*,   14  Current Address*,   15  Permanent Address*, 16 Phone Number, 17 Mobile Number*  , 18    Email Address*  , 19    Father/Guardian Name*,  20  Father/Guardian Occupation*,    21  Annual Income*  , 22 Religion/Community*, 23    Caste*, 24  Reservation*    , 25    Special Reservation*    , 26    Mother Tongue   , 27    Last Highest Qualification Details*(University/Board Name,Registration/Enrollment Number,Passed Year), 28   Secondary School Details*(School Name,Certificate Number,Passed Year) , 29  Aadhaar Number* , 30    Bank Name,  31  Bank Account Number , 32    Bank IFSC Code  .</li>
                        <li>    In step 3, it is for cross check the information which you are entered in step 2. If any mistake press edit button and correct the respective row according to you records</li>

                        <li>    In step 4 ,you have to upload the photo and signature.</li>
                        <li>Instruction for Upload Photo: -The minimum dimensions are 120 pixels (width) x 150 pixels (height). -The maximum dimensions are 400 pixels (width) x 550 pixels (height),</li>
                        <li>Instruction for Signature Upload Photo: Signature -The minimum dimensions are 120 pixels (width) x 10 pixels (height). -The maximum dimensions are 400 pixels (width) x 250 pixels (height)</li>
                        <li>You could login only after admin verifies your account and a confirmation mail would be sent to the Email-Id you provided</li>
                        <li>After successful registration, enter your username in the username box and your password in password box and click login under Login Panel.</li>
                        <li>Click on the 'Edit Details' option in left 'Actions' panel and enter your details. Press 'Update' button.</li>
                        
                        <li>Press Logout link in top right corner.</li>
                    </ol>
                    <br>
                    
                    <br>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                       <?php $this->view('exam_news',$news_data); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                         <?php $this->view('exam_login_sidebar'); ?>
                    </div>
                </div>


            </div>
        </div>


    </div>




</div>


