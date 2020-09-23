<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 

  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $upass = $_POST['pass'];
  $re_email = $_POST['re_email'];
  $birthday_month = $_POST['birthday_month'];
  $birthday_day = $_POST['birthday_day'];
  $birthday_year = $_POST['birthday_year'];
  $sex = $_POST['sex'];
//   if(isset($_FILES['image'])){
//     echo $_FILES['image']['tmp_name'];
// }else{
//     echo "not set";
// }
  $src = $_FILES['image']['tmp_name'];
  $dest = 'registerImages/'.$_FILES['image']['name'];
  $photo='';

//  $fname = mysqli_real_escape_string($conn,$_POST['firstname']);
//  $lname = mysqli_real_escape_string($conn,$_POST['lastname']);
//  $email = mysqli_real_escape_string($conn,$_POST['email']);
//  $upass = mysqli_real_escape_string($conn,$_POST['pass']);
//  $re_email = mysqli_real_escape_string($conn,$_POST['re_email']);
//  $birthday_month = mysqli_real_escape_string($conn,$_POST['birthday_month']);
//  $birthday_day = mysqli_real_escape_string($conn,$_POST['birthday_day']);
//  $birthday_year = mysqli_real_escape_string($conn,$_POST['birthday_year']);
//  $sex = mysqli_real_escape_string($conn,$_POST['sex']);
 //$image = mysqli_real_escape_string($conn,$_POST['image']);


  // Profile photo
  
      
  if(move_uploaded_file($src,$dest)){
      $photo = $_FILES['image']['name'];
      echo $photo;
     // $sql = "INSERT INTO addContacts set user_id = '".$userRow['user_id']."', user_name = '".$_POST['name']."', user_email = '".$_POST['email']."', photo='".$photo."',created = NOW()";
     // echo $sql;
      if(mysqli_query($conn,"INSERT INTO users(firstname,lastname,email,password,day,month,year,sex,avatar,created) VALUES('$fname','$lname','$email','$upass',' $birthday_day','$birthday_month','$birthday_year',' $sex', '$photo', NOW())"))
      {
       ?>
<script>
alert('successfully registered ');
</script>
<?php
header("Location:index.php");

      }
      else
      {
       ?>
<script>
alert('error while registering you...');
</script>
<?php
      }
  }
 


}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login & Registration System</title>
    <link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>
    <div id="header">
        <div id="left">
            <label>MICRORAPTER</label>
        </div>
        <div id="right">
            <div id="content">
                -the sharing & chatting site
            </div>
        </div>
    </div>

    <center>






        <div id="login-form">
            <form method="POST" enctype="multipart/form-data">

                <h2>Sign Up</h2>



                -It's free and always will be


                <table align="center" width="80%" border="0">
                    <!--
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
-->
                    <tr>
                        <td><input type="text" class="inputtext _58mg _5dba" data-type="text" name="firstname" value=""
                                aria-required="1" placeholder="First Name" id="u_0_1" aria-label="First Name"></td>

                        <td><input type="text" class="inputtext _58mg _5dba" data-type="text" name="lastname" value=""
                                aria-required="1" placeholder="Last Name" id="u_0_3" aria-label="Last Name"></td>
                    </tr>
                    <tr>

                        <td colspan=2><input type="text" class="inputtext _58mg _5dba" data-type="text" name="email"
                                value="" aria-required="1" placeholder="Email or Mobile Number" id="u_0_5"
                                aria-label="Your Email"></td>
                    </tr>
                    <tr>

                        <td colspan=2><input type="text" class="inputtext _58mg _5dba" data-type="text" name="re_email"
                                value="" aria-required="1" placeholder="Re-enter Email or Mobile Number" id="u_0_8"
                                aria-label="Re-enter Email"></td>
                    </tr>

                    <td colspan=2><input type="password" class="inputtext _58mg _5dba" data-type="text" name="pass"
                            aria-required="1" placeholder="New Password" id="u_0_a" value="" aria-label="New Password">
                    </td>
                    </tr>
                    <tr>
                        <td colspan=2>Birthday:
                            <select name="birthday_month" id="month" class="_5dba">
                                <option value="0" selected="1">Month</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <select name="birthday_day" id="day" class="_5dba">
                                <option value="0" selected="1">Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select name="birthday_year" id="year" class="_5dba">
                                <option value="0" selected="1">Year</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                                <option value="1919">1919</option>
                                <option value="1918">1918</option>
                                <option value="1917">1917</option>
                                <option value="1916">1916</option>
                                <option value="1915">1915</option>
                                <option value="1914">1914</option>
                                <option value="1913">1913</option>
                                <option value="1912">1912</option>
                                <option value="1911">1911</option>
                                <option value="1910">1910</option>
                                <option value="1909">1909</option>
                                <option value="1908">1908</option>
                                <option value="1907">1907</option>
                                <option value="1906">1906</option>
                                <option value="1905">1905</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>

                            <table width=100% height=20%>
                                <tr>
                                    <td>Sex:</td>
                                    <td>
                                        <div id="radioButton">
                                            Male
                                            <input type="radio" name="sex" value="male">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="radioButton">
                                            Female
                                            <input type="radio" name="sex" value="female">
                                        </div>
                                    </td>
                                </tr>
                            </table>


                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>Profile Pic:

                            <input type="file" name="image" value="">

                        </td>
                    </tr>
                    <tr>
                        <td colspan=2><button type="submit" name="btn-signup">Sign Me Up</button></td>
                    </tr>
                    <tr>
                        <td colspan=2><a href="index.php">Sign In Here</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>





    <?php
require_once('footer.html');
?>
</body>

</html>