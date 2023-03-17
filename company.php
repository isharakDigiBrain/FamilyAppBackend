<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"
        defer></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"
        defer></script>


    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <!-- <script src="./assets/js/main.js" defer></script> -->
    <script src="./assets/js/company.js" defer></script>



    <title>Company</title>


</head>

<body>
    <nav class="sidebar">
        <div class="menu">
            <div class="sections" onclick="goto('home')">
                <img src="./assets/img/Logo.png" alt="">
                <h6>Dashboard</h6>
            </div>
            <div class="sections" onclick="goto('loans')">
                <img class="transparent-right" src="./assets/img/section-loan.png" alt="">
                <h6>Loan</h6>
            </div>
            <div class="sections" onclick="goto('company')">
                <img class="transparent-right" src="./assets/img/section-company.png" alt="">
                <h6>Company</h6>
            </div>
            <div class="sections">
                <img class="transparent-right" src="./assets/img/section-property.png" alt="">
                <h6>Property</h6>
            </div>
        </div>

        <div class="profile">
            <h6 class="fw-l">Mrs. Khaula Rashid </h6>
        </div>
    </nav>
    <section>

        <div class="dashboard-poster" onclick="goto('company')">
            <!-- <img class="transparent-right" src="./assets/img/section-property.png" alt="" srcset=""> -->
            <h3 class="fw-b mb-4">Company</h3>
            <div class="row">
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <h6 class="fw-l">Loan Issued</h6>
                    <h4 class="fw-b">AED 200000</h4>
                     
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h6 class="fw-l">Loan Issued</h6>
                        <h4 class="fw-b">AED 200000</h4>
                       
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h6 class="fw-l">Loan Issued</h6>
                        <h4 class="fw-b">AED 200000</h4>
                       
                      </div>
                    </div>
                  </div>
              </div>


              


        </div>

        <div class="dashboard-poster" onclick="goto('company')">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start Date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td><span>Edinburgh</span></td>
                        <td><span class="old">61</span></td>
                        <td>2011-04-25</td>
                        <td><span>$320,800.00</span></td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td><span>Tokyo</span></td>
                        <td><span class="old">63</span></td>
                        <td>2011-07-25</td>
                        <td><span>$170,750.00</span></td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td><span>San Francisco</span></td>
                        <td><span class="old">66</span></td>
                        <td>2009-01-12</td>
                        <td><span>$86,000.00</span></td>
                    </tr>

                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td><span>Singapore</span></td>
                        <td><span class="young">29</span></td>
                        <td>2011-06-27</td>
                        <td><span>$183,000.00</span></td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td><span>New York</span></td>
                        <td><span class="young">27</span></td>
                        <td>2011-01-25</td>
                        <td><span>$112,000.00</span></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start Date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </section>

</body>

</html>