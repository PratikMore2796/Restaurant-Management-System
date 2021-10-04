
function cancle()
{
    window.location.href = "Sales.php";
}
function cancletrac()
{
    location.reload();
}
function save()
{

}
function show_data()
{

}
function add()
{
    var medname = document.getElementById('med_name').value;
    var medquantity = document.getElementById('med_quantity').value;
    var medprice = document.getElementById('med_price').value;
    var medtax = document.getElementById('med_tax').value;
    var medtotal = document.getElementById('med_total').value;
    var totalRowCount  = 0;
    var rowCount = 0;
    var table = document.getElementById('op_table');
    var rows = table.getElementsByTagName("tr");
    for(var i= 0; i<rows.length; i++)
    {
        totalRowCount++;
        if(rows[i].getElementsByTagName("td").length>0)
        {
            rowCount++;
        }
    }
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        cell1.innerHTML = rowCount;
        cell2.innerHTML = medname;
        cell3.innerHTML = medquantity;
        cell4.innerHTML = medprice;
        cell5.innerHTML = medtax;
        cell6.innerHTML = medtotal;
        cell7.innerHTML = "<button class='btn btn-success' onclick='delete_data()' style='background-color: #3094FE' type='button'>Delete</button>";
        document.getElementById('med_name').value = "";
        document.getElementById('med_quantity').value="";
        document.getElementById('med_price').value = "";
        document.getElementById('med_tax').value="";
        document.getElementById('med_total').value="";
}
function delete_data()
{

    var index, table = document.getElementById('op_table');
    for(var i = 1; i< table.rows.length; i++)
    {
        table.rows[i].cells[6].onclick = function()
        {
            var c = confirm("do you want to delete this entry");
            if(c === true)
            {
                index = this.parentElement.rowIndex;
                table.deleteRow(index);
            }
        }

    }
    var row = table.deleteRow(rowCount);
}

function calculate()
{
    var price = document.getElementById("med_price").value;
    var quantity = document.getElementById("med_quantity").value;
    var tax = document.getElementById("med_tax").value;
    var calculate = price * quantity+ + +tax;
    document.getElementById("med_total").value = calculate;
}


/*var trt = 0;
function add()
{
    trt++;
    var html = "<tr>";
        html += "<td>"+trt+"</td>";
        html += "<td><input name='med[]'></td>";
        html += "<td><input name='quantity[]'> </td>";
        html += "<td><input name='price[]'> </td>";
        html += "</tr>";
    document.getElementById("add_data").insertRow().innerHTML = html;
}*/