<?php
    include "../resources/php/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/mark-evaluator.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
    <title>Exam Sheet</title>
</head>

<body>
    <header>
        <nav class="nav">
            <div class="nav__logo">
                <img src="../resources/images/logo.svg" alt="Logo">
                <div class="classInfo">
                    <p class="nav__className">Class Name</p>
                    <p class="nav__subjectName">Subject</p>
                </div>
            </div>
            <div class="nav__menu">
                <div class="nav__navigation">
                    <img src="../resources/images/back-button.svg" alt="back button">
                    <img src="../resources/images/settings.svg" alt="">
                </div>
                <div class="nav__name">Jasveen Kaur</div>
            </div>
        </nav>
    </header>
    <section class="answers">
        <div class="answers__sList">
            <div class="answers__heading">
                <h3>Names</h3>
            </div>
            <div class="answers__sList__items custom-scroll">
                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

            </div>
        </div>
        <div class="answers__marks">
            <div class="answers__heading">
                <h3>Enter Marks</h3>
            </div>
            <div class="answers__container">
                <div class="answers__container__table custom-scroll">
                    <table class="answers__markTable">
                        <tr class="answers__markTable__heading" >
                            <th>Questions</th>
                            <th>Marks</th>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
    
    
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
    
    
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
    
    
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
    
    
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
    
    
                        <tr class="answers__markTable__mark">
                            <td>1.</td>
                            <td>
                                <input type="number" value="50">
                            </td>
                        </tr>
                        <tr class="answers__markTable__mark">
                            <td>2.</td>
                            <td>
                                <input type="number" value="30">
                            </td>
                        </tr>
    
                    </table>
                </div>
                <div class="answers__buttons">
                    <img src="../resources/images/add (1).svg" alt="add">
                    <img src="../resources/images/delete.svg" alt="delete">
                </div>
                <div class="answers__totalC">
                    <p>Total = <span id="total">400</span></p>
                    <button>Submit</button>
                </div>
            </div>

        </div>
        <div class="answers__sheet">
            <iframe class="custom-scroll" src="https://drive.google.com/file/d/1YcSh2-dPpsYqOZAysS7zYGsQBajxtEt0/preview" frameborder="0"></iframe>
        </div>
    </section>
</body>

</html>