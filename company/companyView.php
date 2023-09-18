<?php
include "../inc/view_header.php";
include "../functions.php";
?>

    <!-- Above fold -->
    <div class="image-container" id="about">
        <div class="Overlay-image">
        </div>
        <div class="content">
            <div class="image-slide">
                <div class="image-desc active">
                    <h2>Manage your Drugs</h2>
                    <p> Upload and manage the drugs you create.</p>
                </div>
                <div class="image-desc">
                    <h2>Manage your Contracts with Pharmacies</h2>
                    <p>Make and stop contracts to supply various pharmacies.</p>
                </div>
            </div>
            <div class="arrow-buttons">
                <div class="arrow-left"><i class="uil uil-angle-left-b"></i></div>
                <div class="arrow-right"><i class="uil uil-angle-right-b"></i></div>
            </div>
        </div>
    </div>


    <!-- Drugs -->
    <div class="item">
        <div class="title-text">
            <p>Features</p>
            <h1>What do you need?</h1>
        </div>

    </div>

    <div class="drug_section">
        <div class="sidebar">
            <ul class="category-list">
                <li class="category-item active" data-category="Manage-Drugs">MANAGE DRUGS</li>
                <li class="category-item" data-category="Manage-Contracts">MANAGE CONTRACTS</li>
            </ul>
        </div>

        <div class="main_content">

            <div class="category-content active" id="Manage-Drugs">
                <div class="container my-5">
                <h2>List of Drugs</h2>
<br>
                <a class="btn btn-primary" href="adddrugs.php" role="button">Add Drugs</a>
<br>
<?php
// Assuming you have already established a database connection ($conn)

// Fetch unique drug categories
$uniqueCategoriesQuery = $conn->query("
SELECT DISTINCT Drug_Category
FROM drugs
WHERE Drug_Company = '$ID'
;");

$uniqueCategories = array();
while ($row = $uniqueCategoriesQuery->fetch_assoc()) {
    $uniqueCategories[] = $row['Drug_Category'];
}
?>


                <div class="select-container">
                    <form method="POST" class="select-container company">
                        <label for="selectedCategory">Categories: </label>
                        <?php foreach ($uniqueCategories as $category) : ?>
                            <button class="btn btn-primary company" type="submit" name="selectedCategory" value="<?php echo $category; ?>"><?php echo $category; ?></button>
                        <?php endforeach; ?>
                        <button class="btn btn-danger company" type="submit" name="selectedCategory" value="null">No Filter</button>
                    </form>
                </div>


                <ul class="categorized-drugs">
                    <?php
                    // Assuming you want to display drugs of the selected category
                    if (isset($_POST['selectedCategory'])) {
                        $selectedCategory = $_POST['selectedCategory'];

                        $query2 =  $conn->query("SELECT *
                        FROM drugs d
                        WHERE d.Drug_Category = '$selectedCategory'
                        ;");

                        $drugCategory = array();
                        while ($row = $query2->fetch_assoc()) {
                            $drugCategory[] = $row;
                        }


            foreach ($drugCategory as $eachDrug) {
                echo "<li class='items'>";
                echo '<img src="data:image/png;base64,' . base64_encode($eachDrug['Drug_Image']) . '" alt="' . $eachDrug['Drug_Name'] . '">';
                echo "<p class='items name'>" . strtoupper( $eachDrug["Drug_Name"] ). "</p>";
                echo "<a href='details.php?id=" . $eachDrug["Drug_ID"] . "'><p class='items link'>View Details</p></a>";
                echo "</li>";
            }


                    }
                    ?>
                </ul>
    </div>

    
            <table class="table">
                <!-- <thead>
                    <tr>
                        <th>Drug ID</th>
                        <th>Drug Name</th>
                        <th>Drug Description</th>
                        <th>Drug Expiration Date</th>
                        <th>Drug Manufacturing Date</th>       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // require_once("../connect.php");

                    // $sql = "
                    // SELECT * 
                    // FROM drugs d
                    // WHERE d.Drug_Company = '$ID'
                    // ;";
                        
                    // $result = $conn->query($sql);

                    // if ($result->num_rows > 0) {
                    //     while ($row = $result->fetch_assoc()){
                    //     echo"
                    //     <tr>                                 
                    //         <td>$row[Drug_ID]</td>
                    //         <td>$row[Drug_Name]</td>
                    //         <td>$row[Drug_Description]</td>
                    //         <td>$row[Drug_Expiration_Date]</td>
                    //         <td>$row[Drug_Manufacturing_Date]</td>
                    //         <td>
                    //         <a class='btn btn-danger btn-sm' href='confirmDeleteDrug.php?id=" . $row["Drug_ID"] . "'>Delete</a>
                    //     </td>
                    
                    //     </tr>";
                    //     }
                    // } else {
                    //     echo "<tr><td colspan='6'>No drugs in stock.</td></tr>";
                    // }
                ?>
                </tbody>-->
            </table>
        </div>

            <div class="category-content" id="Manage-Contracts">
                <div class="container my-5">
                    <h2>List of Contracts</h2>            
                    <br>
                    <a class="btn btn-primary" href="pharmacyList.php" role="button">Add New Contract</a>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>     
                                <th>Contract ID</th>
                                <th>Company</th>
                                <th>Pharmacy</th>
                                <th>Contract Supervisor</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   
                            
                            require_once("../connect.php");

                            $result = $conn->query("
                            SELECT c.Contract_ID, cmp.Company_Name, p.Pharmacy_Name, s.Supervisor_Name, s.Supervisor_Email, c.Start_Date, c.End_Date, c.Status
                            FROM contracts c
                            INNER JOIN company cmp ON c.Company_ID = cmp.Company_ID
                            INNER JOIN supervisors s ON c.Supervisor_ID = s.Supervisor_ID
                            INNER JOIN pharmacy p ON c.Pharmacy_ID = p.Pharmacy_ID
                            WHERE c.Company_ID = '$ID'");

                            // Display the contracts data in the table
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Contract_ID"] . "</td>";
                                    echo "<td>" . $row["Company_Name"] . "</td>";
                                    echo "<td>" . $row["Pharmacy_Name"] . "</td>";
                                    echo "<td>" . $row["Supervisor_Name"] . "</td>";
                                    echo "<td>" . $row["Start_Date"] . "</td>";
                                    echo "<td>" . $row["End_Date"] . "</td>";
                                    echo "<td>" . $row["Status"] . "</td>";
                                    echo "<td>";
                                    if ($row["Status"] == 'Active' || 'active' || 'ACTIVE') {
                                        echo "<a class='btn btn-danger btn-sm' href='terminate_contract.php?contractID=" . $row["Contract_ID"] . " &email= + " . $row["Supervisor_Email"] ."'>Terminate</a>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        const selectElement = document.getElementById("availableDrugs");
        const drugInfoDiv = document.getElementById("drugInfo");
        const drugNameParagraph = document.getElementById("drugName");
        const drugPriceParagraph = document.getElementById("drugPrice");
        const drugDescriptionParagraph = document.getElementById("drugDescription");
        const drugManufacturingDateParagraph = document.getElementById("drugManufacturingDate");
        const drugExpirationDateParagraph = document.getElementById("drugExpirationDate");

        selectElement.addEventListener("change", (event) => {
            const selectedDrug = event.target.value;
            if (selectedDrug) {
                //convert from php array to js array
                const drug = <?php echo json_encode($drugInformation); ?>;
                const selectedDrugID = drug.find((item) => item.Drug_ID === selectedDrug);
                
                fetch("store_selected_drug.php", {
                    method: "POST",
                    body: JSON.stringify({ selectedDrug }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                });
                if (selectedDrugID) {
                    drugNameParagraph.textContent = "Drug Name: " + selectedDrugID.Drug_Name;
                    drugPriceParagraph.textContent = "Price: " + selectedDrugID.Drug_Price;
                    drugDescriptionParagraph.textContent = "Description: " + selectedDrugID.Drug_Description;
                    drugManufacturingDateParagraph.textContent = "Manufacturing Date: " + selectedDrugID.Drug_Manufacturing_Date;
                    drugExpirationDateParagraph.textContent = "Expiration Date: " + selectedDrugID.Drug_Expiration_Date;
                    drugInfoDiv.style.display = "block";
                } else {
                    drugInfoDiv.style.display = "none";
                }
            } else {
                drugInfoDiv.style.display = "none";
            }
        });
    </script>


    <script src="../overlay_script.js"></script>
    <script src="../image_slider.js"></script>
    <script src="../category_selector.js"></script>

    <?php include "../inc/footer.php";?>