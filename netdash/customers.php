<?php
$con = new mysqli('localhost', 'root', '', 'customers');
$sql = "SELECT * FROM customer";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Network Performance Dashboard</title>
</head>
<body>
    <div class="sidendcontent">
        <div class="content">
            <nav class="sidebar-customer">
                <ul>
                    <li><a href="home.html"><img src="images/home.png" alt="Home">Home</a></li>
                    <li><a href="customers.php"><img src="images/customer.png" alt="Customers">Customers</a></li>
                    <li><a href="dashboard.html"><img src="images/dashboard.png" alt="Dashboard">Dashboard</a></li>
                    <li><a href="contact.php"><img src='images/contact.png' alt="Dashboard" />Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="app">
            <header class="header">
                <div class="logo">
                    <a href="https://www.huawei.com/en/" target="_blank"><img src="images/huawei.png" alt="Huawei Logo"></a>
                </div>
                <div class="title"> 
                    <h1 class="page-title">Network Performance Dashboard</h1>
                </div>
                <div class="auth">
                    <img src="images/login.png" alt="Login">
                </div>
            </header>
            <div class="divider"></div>
            <div class="table-header">
                <h2>Customers Table</h2>
                <div class="search-bar">
                    <input type="text" placeholder="Search customer" id="search-input">
                    <button class="research-button" name="submit">Search</button>
                </div>
            </div>
            <div class="divforscroll">
                <div class="customer-table-wrapper">
                    <table class="customer-table">
                        <thead>
                            <tr>
                                <th><div>Customer</div></th>
                                <th><div>Country</div></th>
                                <th><div>Customer Since</div></th>
                                <th><div>Most Used Product</div></th>
                                <th><div>Ranking In Previous Month</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['country']}</td>
                                    <td>{$row['huawei_partner_since']}</td>
                                    <td>{$row['most_used_product']}</td>
                                    <td>{$row['ranking_last_month']}</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="no-results-message">
                    <p>No data found</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var jq = jQuery.noConflict();
    jq(function($) {
        var tableWrapper = $('.customer-table-wrapper');
        var noResultsRow = $('.no-results-row');
        var noResultsMessage = $('.no-results-message');
        var tableHeader = $('.customer-table thead');

        $('#search-input').on('keyup', function(){
            var searchText = $(this).val().toLowerCase();

            var visibleRows = 0;

            $('.customer-table tbody tr').each(function() {
                var row = $(this);
                var isVisible = row.text().toLowerCase().indexOf(searchText) > -1;
                row.toggle(isVisible);
                if (isVisible) {
                    visibleRows++;
                }
            });

            noResultsRow.toggle(visibleRows === 0);
            noResultsMessage.toggle(visibleRows === 0);
            tableWrapper.toggle(visibleRows > 0);
            tableHeader.toggle(visibleRows > 0);

            adjustTableHeight(tableWrapper);
        });

        function adjustTableHeight(wrapper) {
            var visibleRows = wrapper.find('.customer-table tbody tr:visible').length;
            var rowHeight = wrapper.find('.customer-table tbody tr:first').outerHeight();
            var headerHeight = tableHeader.outerHeight();

            var maxHeight = (rowHeight * visibleRows) + headerHeight;

            wrapper.css('max-height', maxHeight + 'px');
        }

        adjustTableHeight(tableWrapper);
    });
    </script>

<footer>
      <p>&copy; 2023 Huawei. All rights reserved. | Developed by Elyes Besbes - Summer Internship 2023 -
        <a href="https://www.facebook.com/elyes.besbes.7/" target="_blank" class="footerimg"><img src='images/Facebook-me.png' alt="FB" /></a>
        <a href="https://www.instagram.com/ely__bes/?hl=fr" target="_blank" class="footerimg"><img src='images/Instagram-me.png' alt="INST" /></a>
        <a href="https://www.linkedin.com/in/elyes-besbes-ict-engineer/" target="_blank" class="footerimg"><img src='images/LinkedIn-me.png' alt="LN" /></a>
      </p>
    </footer>
</body>
</html>
