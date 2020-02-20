<!DOCTYPE html>

<?php
include "php/show_data.php";
// include "php/update_database.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="css/profile-arkademy.css">
</head>
<body>
    <nav>
        <div class="menu-mobile">
            <a href="#" onclick="showMenu()">Menu</a>
        </div>
        <ul id="menu">
            <li><a href="#">HOME</a></li>
            <li><a href="#">PRODUCT</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">NEWS</a></li>
            <li><a href="#">MY INVENTORY</a></li>
        </ul>
    </nav>

    <section id="box-profile">
        <div class="img-profile">
            <div class="photo" style="background-image: url(images/kirito-profile-picture.png);"></div>
        </div>
        <div class="description">
            <h1 id="pName"><?php echo $nama ?></h1>
            <p id="pRole"><?php echo $role ?></p>
            <a href="#input-form" class="button bg-green" onclick="editForm()">Edit</a>
            <a href="#" class="button border-blue">Resume</a>
        </div>
        <div class="information">
            <div class="data">
                <p class="field">Availability</p>
                <p id="pAvailability" class="text-gray"><?php echo $availability ?></p>
            </div>
            <div class="data">
                <p class="field">Age</p>
                <p id="pAge" class="text-gray"><?php echo $age ?></p>
            </div>
            <div class="data">
                <p class="field">Location</p>
                <p id="pLocation" class="text-gray"><?php echo $location ?></p>
            </div>
            <div class="data">
                <p class="field">Years Experience</p>
                <p id="pYears" class="text-gray"><?php echo $years ?></p>
            </div>
            <div class="data">
                <p class="field">Email</p>
                <p id="pEmail" class="text-gray"><?php echo $email ?></p>
            </div>
        </div>
    </section>

    <section id="input-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form">
                <label>Id User</label>
                <input id="inpIdUser" type="text" name="id_user" value="<?php echo $id; ?>">
            <div class="form">
                <label>Name</label>
                <input id="inpName" type="text" name="name">
            </div>
            <div class="form">
                <label>Role</label>
                <input id="inpRole" type="text" name="role">
            </div>
            <div class="form">
                <label>Availability</label>
                <input id="InpAvailability" type="text" name="availability">
            </div>
            <div class="form">
                <label>Age</label>
                <input id="inpAge" type="number" name="age">
            </div>
            <div class="form">
                <label>Location</label>
                <input id="inpLocation" type="text" name="location">
            </div>
            <div class="form">
                <label>Years Experience</label>
                <input id="inpYears" type="number" name="years">
            </div>
            <div class="form">
                <label>Email</label>
                <input id="inpEmail" type="email" name="email">
            </div>
            <div>
                <input onclick="simpanForm()" type="submit" name="submit" value="Submit" class="bg-blue">
            </div>
        </form>
    </section>

    <script type="text/javascript">
        var  formMenu = document.getElementById("input-form");
        formMenu.style.display = "none";

        function editForm(){
            if(formMenu.style.display === 'none'){
                formMenu.style.display = 'block';
            } else {
                formMenu.style.display = 'none';
            }

            var name = document.getElementById("pName").innerHTML;
            var role = document.getElementById("pRole").innerHTML;
            // var availability = document.getElementById("pAvailability").innerHTML;
            var age = document.getElementById("pAge").innerHTML;
            var location = document.getElementById("pLocation").innerHTML;
            var years = document.getElementById("pYears").innerHTML;
            var email = document.getElementById("pEmail").innerHTML;

            document.getElementById("inpName").value = name;
            document.getElementById("inpRole").value = role;
            // document.getElementById("inpAvailability").value = available;
            document.getElementById("inpAge").value = age;
            document.getElementById("inpLocation").value = location;
            document.getElementById("inpYears").value = years;
            document.getElementById("inpEmail").value = email;
        }

        function simpanForm(){
            formMenu.style.display = 'none';

            var name = document.getElementById("inpName").value;
            var role = document.getElementById("inpRole").value;
            // var availability = document.getElementById("inpAvailability").value;
            var age = document.getElementById("inpAge").value;
            var location = document.getElementById("inpLocation").value;
            var years = document.getElementById("inpYears").value;
            var email = document.getElementById("inpEmail").value;
            
            document.getElementById("pName").innerHTML = name;
            document.getElementById("pRole").innerHTML = role;
            // document.getElementById("pAvailability").innerHTML = available;
            document.getElementById("pAge").innerHTML = age;
            document.getElementById("pLocation").innerHTML = location;
            document.getElementById("pYears").innerHTML = years;
            document.getElementById("pEmail").innerHTML = email;
        }

        function showMenu() {
            var menu = document.getElementById("menu");
            var box = document.getElementById("box-profile");
            if(menu.style.display === "block" ){
                menu.style.display = "none";
                box.style.paddingTop = "0px";
            }else{
                menu.style.display = "block";
                box.style.paddingTop = "125px";
            }
        }
    </script>
</body>
</html>