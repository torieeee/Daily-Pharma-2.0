<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>
<body class="Register">

    <!--Header-->
    <header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <nav class= navbar id="navbar">
            <a href="index.html">Home</a>
            <a href="index.html#service">About Us</a>
            <a href="index.html#feature">Features</a>
            <a href="index.html#testimonials">Testimonials</a>
            <a href="index.html#footer">Contact Us</a>
            <a href="login.html" class="btn-login-popup" >Login</a>
        </nav>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="index.html#service">About Us</a>
                <a href="index.html#feature">Features</a>
                <a href="index.html#testimonials">Testimonials</a>
                <a href="index.html#footer">Contact Us</a>
                <a href="login.html">Login</a>
            </div>
        </div>
    </header>

    <!--Dynamic Register Form-->

    <div class="wrapper">

        <div class="title-text">
            <h1>Registration</h1>
        </div>

        <div class="users">
            <button class="patient_r">Patient</button>
            <button class="doctor_r">Doctor</button>
            <button class="pharmacy_r">Pharmacy</button>
            <button class="company_r">Company</button>
        </div>

        <div class="form">
            <form action="registerPatient.php" class="register_patient" method="post" name="register_patient">
                <div class="input-box">
                    <label >SSN</label>
                    <input type="text" name="Patient_SSN" required>
                </div>
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Patient_Name" required>
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="email" name="Patient_Email" required>
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Patient_Phone" required>
                </div>
                <div class="input-box">
                    <label for="gender">Gender</label>
                    <select name="Patient_Gender" id="gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <label >Address</label>
                    <input type="text" name="Patient_Address" required>
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="Patient_DOB" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password" required>
                </div>

                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                
                <button type="submit" class="registerbtn">Register</button>
                <a class="btn btn-outline-primary" href="register.html" role="button">Cancel</a>
            </form>
    
            <form action="registerDoctor.php" class="register_doctor" method="post" name="register_doctor">
                <div class="input-box">
                    <label >SSN</label>
                    <input type="text" name="Doctor_SSN" required>
                </div>
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Doctor_Name" required>
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Doctor_Phone" required>
                </div>
                <div class="input-box">
                    <label >Speciality</label>
                    <input type="text" name="Doctor_Speciality" required>
                </div>
                <div class="input-box">
                    <label>Experience</label>
                    <input type="date" name="Doctor_Experience" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password" required>
                </div>

                
                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
                <a class="btn btn-outline-primary" href="register.html" role="button">Cancel</a>
            </form>
    
            <form action="registerPharmacy.php" class="register_pharmacy" method="post" name="register_pharmacy">
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Pharmacy_Name">
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" name="Pharmacy_Email">
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Pharmacy_Phone">
                </div>
                <div class="input-box">
                    <label >Address</label>
                    <input type="text" name="Pharmacy_Address">
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password">
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password">
                </div>


                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
                <a class="btn btn-outline-primary" href="register.html" role="button">Cancel</a>
            </form>
    
            <form action="registerCompany.php" class="register_company" method="post" name="register_company">
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Company_Name">
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="email" name="Company_Email">
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="tel" name="Company_Phone">
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password">
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password">
                </div>

                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
                <a class="btn btn-outline-primary" href="register.html" role="button">Cancel</a>
            </form>
        </div>
    </div>
    <script src="script2.js"></script>

</body>
</html>

