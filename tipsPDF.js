var counter = 0;

const tipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];
if (sessionStorage.getItem("tipsPlan") != null) {
    for (let tip in tipsPlan) {
        $('#tipsPlanStart').html("");

        // query database for the tip id & description using an Id
        $.ajax({
            type: "GET",
            data: { tipId: tipsPlan[tip] },
            url: "tipsPlan.php",
            success: function (response) {
                // if successful, append the data to the tips canvas body
                var planRowContents = " - ";
                planRowContents += response[0].T_DESC_ENGLISH;
                planRowContents += "<br><br>";

                // NEW (05/01/23)
                // with the updated query in tipsPlan.php you can grab the Category name
                // and the subcategory name. I need help choosing correct name though for tip
                //var planCName = " ";
                //planCName += response[0].C_NAME;

                //creating new element to append
                var planRow = document.createElement('div');
               
                
                //set the attributes for that element
                planRow.setAttribute("id", `tipsCanvasDiv-${tipsPlan[tip]}`);
                planRow.setAttribute("style", 'line-height:2');

                //NEW (05/01/23)
                // create the header element that has cat name and sub cat name
                //var h2 = document.createElement("h2");
                //h2.innerHTML = planCName + ", " + response[0].SUB_NAME;
                //planRow.appendChild(h2);

                //NEW (05/01/23)
                var p = document.createElement("p");
                p.innerHTML = planRowContents;
                planRow.appendChild(p);


                $('#tipsPlanStart').append(planRow);
                counter++;
                
                //print on last ajax query
                if(counter == tipsPlan.length)
                {
                    print();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Error code
                console.log(textStatus + ": " + errorThrown);
            }
        });
    }
}

function print()
{
    var element = document.getElementById('WholePlan');
    var opt = {
        margin: 8,
        filename: 'tips_plan.pdf',
        image: { type: 'jpeg', quality: 1.00 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'letter', orientation: 'portrait' },
    };
    
    html2pdf().set(opt).from(element).save();
    //html2pdf(element);
}