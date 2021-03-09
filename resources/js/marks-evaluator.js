var test = document.getElementById('test');
var totalID = document.getElementById('total');
var marksheet = document.getElementById('markSheet');


function extractor(url){
    if(url.search("google.com") !== -1){
        url = "https://drive.google.com/file/d/" + url.split("/")[5] + "/preview";
        return url;
    }
}
marksheet.setAttribute("src",extractor(exam_sheet[0][4]));

let text = '', total = 0;
for(let i = 5; i < exam_result[0].length; i++){
    text += `
    <tr class='answers__markTable__mark'>
        <td>${i-4}</td>
        <td><input type='number' name='Q${i-4}' class='marks' value='${exam_result[0][i]}'></td>
    </tr>`;
    total += parseInt(exam_result[0][i]);
} 

test.innerHTML += text; 
totalID.innerHTML = total;

var addBox = document.getElementById("addBox");
var delBox = document.getElementById("delBox");

addBox.addEventListener("click", (e) => {
    var test = document.getElementById('test');
    marks = document.querySelectorAll(".marks");
    let length = parseInt(marks.length + 2);
    var row = test.insertRow(length);
    row.classList.add("answers__markTable__mark");
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = length - 1;
    cell2.innerHTML = `<input type="number" name='Q${(length - 1)}' class="marks" value="0">`;

    marks.forEach(function(elem){
        if(elem.value == "")
            elem.value = 0;
        total = 0;
        for(let i = 0; i < marks.length; i++){
            total += parseInt(marks[i].value);
        }        
        totalID.innerHTML = total;
    })
});

var marks = document.querySelectorAll(".marks");
var answers__sList__item = document.querySelectorAll('.answers__sList__item');

for(let q = 0; q < answers__sList__item.length; q++){
    answers__sList__item[q].addEventListener("click", () => {
        answers__sList__item.forEach(function(elem){
            elem.classList.remove("selected");
        });
        answers__sList__item[q].classList.add("selected");
        total = 0;
        var id = answers__sList__item[q].id;
        id = id.split("-")[1];
        for(let i = 5; i < exam_result[0].length; i++){
            marks[i-5].value = parseInt(exam_result[id][i]);
            total += parseInt(exam_result[id][i]);
        }
        marksheet.setAttribute("src",extractor(exam_sheet[id][4]));
        totalID.innerHTML = total;
    }); 
};


marks.forEach(function(elem){
    elem.addEventListener("change", () => {
        if(elem.value == "")
            elem.value = 0;
        total = 0;
        for(let i = 0; i < marks.length; i++){
            total += parseInt(marks[i].value);
        }        
        totalID.innerHTML = total;
    })
})

var backBtn = document.getElementById("backBtn");

backBtn.addEventListener("click", () => {
    window.location.href = "../dashboard/teacher-dashboard/";
})

delBox.addEventListener("click", (e) => {
    var marks = document.querySelectorAll(".marks");
    if(marks.length !== 0)
        test.deleteRow(marks.length);
    marks.forEach(function(elem){
        if(elem.value == "")
            elem.value = 0;
        total = 0;
        for(let i = 0; i < marks.length; i++){
            total += parseInt(marks[i].value);
        }        
        totalID.innerHTML = total;
    })
});

var subBtn = document.getElementById('subBtn');

subBtn.addEventListener("click", () => {
    var resultId = document.getElementById('resultId');

    var selected = document.querySelector('.selected');
    let id = selected.children[0].innerHTML;
    let str = id.split(".")[0];
    document.getElementById('stu_rollNo').setAttribute("value",str);
});