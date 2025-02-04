<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .amount-div{
    display: flex;
    justify-content: space-between;
    background-color: rgb(15, 92, 115);
    }
    .pay-button button{
        background: rgb(15, 92, 115);
        color: white;
        font-weight: bold;
        border: 0;
        padding: 10px 20px;
        border-radius: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }
    .options::before{
        display: none;
        content: "";
        position: absolute;
        background-color: rgb(15, 92, 115);
        width: 5px;
        height: 100%;
        top: 0;
        left: 0;
    }
    </style>
</head>
<body>
    <div class="logo">    
        <a href="Website.php"><div><img src="logo2.png" alt="" width="190"></div></a>
    </div>
    <section class="outer">
        <div class="amount-div">
            <div>
                <p id="amount">Amount: </p> 
            </div>
            <div>
                <p id="transaction-id">Transaction ID:</p>
            </div>
        </div>
        <div class="choose-pay">
            <p>Choose a payment method</p>
        </div>
        <main>
            <aside>
                <div class="options" onclick="select_option(this);" id="debit">Debit Card</div>
                <div class="options" onclick="select_option(this);" id="credit">Credit Card</div>
                <form action="" method="get">
                    <div id="debit_media">
                        <div class="adjust">
                            <div class="labels">
                                <label for="card-type" class="card-type">Card Type</label>
                                <label for="card-number">Card Number</label>
                                <label for="card-name">Holder Name</label>
                                <label for="cvv">CVV Number</label>
                                <label for="expiry">Expiry Date</label>
                            </div>
                            <div class="inputs">
                                <div class="radio">
                                    <div>
                                        <input required required type="radio" id="visa1" name="card">
                                        <label for="visa1">
                                            <img src="https://static-00.iconduck.com/assets.00/visa-icon-2048x628-6yzgq2vq.png" width="50">
                                        </label>
                                    </div>
                                    <div>
                                        <input required type="radio" id="master1" name="card">
                                        <label for="master1" id="mcard">
                                            <img src="https://static-00.iconduck.com/assets.00/mastercard-icon-2048x1225-3kb6axel.png" alt="" width="40">
                                        </label>
                                    </div>
                                </div>
                                <input required type="text" name="card-number1" id="card-number">
                                <input required type="text" name="card-name1" id="card-name">
                                <input required type="password" name="cvv1" id="cvv">
                                <input required type="date" name="expiry1" id="expiry">
                            </div>
                        </div>
                      <div class="pay-button">
                            <button onclick="reciept();" type="submit" name="submit1">Pay Now</button>
                        </div>
                    </div>
                </form>

                <div class="options" onclick="select_option(this);" id="net-banking">Net Banking</div>
                <form action="" method="get">
                    <div id="net_media">
                        <div>
                            <p>Select your Bank</p>
                            <p>Popular Banks</p>
                            <div class="banks">
                                <div class="hdfc">
                                    <input required type="radio" name="bank1" id="hdfc_radio">
                                    <label for="hdfc_radio"><img src="https://www.shutterstock.com/image-vector/hdfc-bank-logo-vector-indian-260nw-2351748935.jpg" width="100px"></label>
                                </div>
                                <div class="axis">
                                    <input required type="radio" name="bank1" id="axis_radio">
                                    <label for="axis_radio"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Axis_Bank_logo.svg/2560px-Axis_Bank_logo.svg.png" width="100px"></label>
                                </div>
                                <div class="kotak">
                                    <input required type="radio" name="bank1" id="kotak_radio">
                                    <label for="kotak_radio"><img src="https://cdn2.downdetector.com/static/uploads/logo/Kotak_Mahindra_Bank_logo.png" width="100px"></label>
                                </div>
                                <div class="sbi">
                                    <input required type="radio" name="bank1" id="sbi_radio">
                                    <label for="sbi_radio"><img src="https://www.freepnglogos.com/uploads/sbi-logo-png/sbi-logo-state-bank-india-group-vector-eps-0.png" width="70px"></label>
                                </div>
                            </div>
                            <div>
                                <p>All Banks</p>
                                <select>
                                    <option value="icici">ICICI Bank</option>
                                    <option value="sbi">State Bank of India (SBI)</option>
                                    <option value="hdfc">HDFC Bank</option>
                                    <option value="axis">Axis Bank</option>
                                    <option value="kotak">Kotak Mahindra Bank</option>
                                    <option value="indusind">IndusInd Bank</option>
                                    <option value="yes">Yes Bank</option>
                                    <option value="idbi">IDBI Bank</option>
                                    <option value="pnb">Punjab National Bank (PNB)</option>
                                    <option value="canara">Canara Bank</option>
                                    <option value="union">Union Bank of India</option>
                                    <option value="bob">Bank of Baroda</option>
                                    <option value="dena">Dena Bank</option>
                                    <option value="vijaya">Vijaya Bank</option>
                                    <option value="uco">UCO Bank</option>
                                    <option value="allahabad">Allahabad Bank</option>
                                    <option value="central">Central Bank of India</option>
                                    <option value="boi">Bank of India</option>
                                    <option value="idfc">IDFC Bank</option>
                                    <option value="rbl">RBL Bank</option>
                                    <option value="south">South Indian Bank</option>
                                    <option value="karur">Karur Vysya Bank</option>
                                </select>
                            </div>
                            <div class="pay-button">
                                <button onclick="reciept();" type="submit" name="submit2">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="options" onclick="select_option(this);" id="wallets">Wallets</div>
                <div class="options" onclick="select_option(this);" id="upi">Upi</div> -->
            </aside>
            <form action="" method="GET">
                <div class="pay-area" style="border: 0;margin-left: 60px;">
                    <div class="debit" id="debit_show" style="display: flex;">
                        <div class="adjust">
                            <div class="labels">
                                <label for="card-type" class="card-type">Card Type</label>
                                <label for="card-number">Card Number</label>
                                <label for="card-name">Name of the Holder</label>
                                <label for="cvv">CVV Number</label>
                                <label for="expiry">Expiry Date</label>
                            </div>
                            <div class="inputs">
                                <div class="radio">
                                    <div>
                                        <input required type="radio" id="visa" name="card">
                                        <label for="visa">
                                            <img src="https://static-00.iconduck.com/assets.00/visa-icon-2048x628-6yzgq2vq.png" width="50">
                                        </label>
                                    </div>
                                    <div>
                                        <input required type="radio" id="master" name="card">
                                        <label for="master">
                                            <img src="https://static-00.iconduck.com/assets.00/mastercard-icon-2048x1225-3kb6axel.png" alt="" width="40">
                                        </label>
                                    </div>
                                </div>
                                <input required type="text" name="card-number2" id="card-number">
                                <input required type="text" name="card-name2" id="card-name">
                                <input required type="password" name="cvv2" id="cvv">
                                <input required type="date" name="expiry2" id="expiry">
                            </div>
                        </div>
                        <div class="pay-button">
                            <button onclick="reciept();" name="submit3">Pay Now</button>
                        </div>
                    </div>
                    <div class="credit" id="credit_show"></div>
                    <div id="net_show">
                        <div>
                            <p>Select your Bank</p>
                            <p>Popular Banks</p>
                            <div class="banks">
                                <div class="hdfc">
                                    <input required type="radio" name="bank2" id="hdfc_radio1">
                                    <label for="hdfc_radio1"><img src="https://www.shutterstock.com/image-vector/hdfc-bank-logo-vector-indian-260nw-2351748935.jpg" width="100px"></label>
                                </div>
                                <div class="axis">
                                    <input required type="radio" name="bank2" id="axis_radio1">
                                    <label for="axis_radio1"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Axis_Bank_logo.svg/2560px-Axis_Bank_logo.svg.png" width="100px"></label>
                                </div>
                                <div class="kotak">
                                    <input required type="radio" name="bank2" id="kotak_radio1">
                                    <label for="kotak_radio1"><img src="https://cdn2.downdetector.com/static/uploads/logo/Kotak_Mahindra_Bank_logo.png" width="100px"></label>
                                </div>
                                <div class="sbi">
                                    <input required type="radio" name="bank2" id="sbi_radio1">
                                    <label for="sbi_radio1"><img src="https://www.freepnglogos.com/uploads/sbi-logo-png/sbi-logo-state-bank-india-group-vector-eps-0.png" width="70px"></label>
                                </div>
                            </div>
                            <div>
                                <p>All Banks</p>
                                <select>
                                    <option value="icici">ICICI Bank</option>
                                    <option value="sbi">State Bank of India (SBI)</option>
                                    <option value="hdfc">HDFC Bank</option>
                                    <option value="axis">Axis Bank</option>
                                    <option value="kotak">Kotak Mahindra Bank</option>
                                    <option value="indusind">IndusInd Bank</option>
                                    <option value="yes">Yes Bank</option>
                                    <option value="idbi">IDBI Bank</option>
                                    <option value="pnb">Punjab National Bank (PNB)</option>
                                    <option value="canara">Canara Bank</option>
                                    <option value="union">Union Bank of India</option>
                                    <option value="bob">Bank of Baroda</option>
                                    <option value="dena">Dena Bank</option>
                                    <option value="vijaya">Vijaya Bank</option>
                                    <option value="uco">UCO Bank</option>
                                    <option value="allahabad">Allahabad Bank</option>
                                    <option value="central">Central Bank of India</option>
                                    <option value="boi">Bank of India</option>
                                    <option value="idfc">IDFC Bank</option>
                                    <option value="rbl">RBL Bank</option>
                                    <option value="south">South Indian Bank</option>
                                    <option value="karur">Karur Vysya Bank</option>
                                </select>
                            </div>
                            <div class="pay-button" >
                                <button type="submit" name="submit3" onclick="reciept();">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="wallets" id="wallet_show"></div>
                <div class="upi" id="upi_show"></div>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
    
    <script>
        function amount(){
            let cookies  = document.cookie.split(";");
            let cookie = [];
            let amount = document.getElementById("amount");
            cookies.forEach(ele => {
                cookie.push(ele.split("="));
            });
            let am;
            let tik;
            cookie.forEach(i => {
                if (i[0] == "price" || i[0] == " price"){
                    am = i[1];
                }
                else if (i[0] == "tickets" || i[0] == " tickets"){
                    tik = i[1];
                }
            })
            amount.innerHTML = `Amount: ${am*tik}.00Rs`;
        }
        function reciept(){
            open('Ticket_generator.php');
        }
        amount();
    </script>
</body>
</html>