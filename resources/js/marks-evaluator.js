var test = document.getElementById('test');
var totalID = document.getElementById('total');
var marksheet = document.getElementById('markSheet');

// https://drive.google.com/file/d/1YcSh2-dPpsYqOZAysS7zYGsQBajxtEt0/preview
function extractor(url){
    console.log(url);
    if(url.search("google.com") !== -1){
        url = "https://drive.google.com/file/d/" + url.split("/")[5] + "/preview";
        return url;
    }
}

marksheet.setAttribute("src",extractor(exam_sheet[0][4]));

let text = '';
let total = 0;
for(let i = 5; i < exam_result[0].length; i++){
    text += `<tr class='answers__markTable__mark'>
        <td>${i-4}</td>
        <td>
            <input type='number' class='marks' value='${exam_result[0][i]}'>
        </td>
    </tr>`;
    total += parseInt(exam_result[0][i]);
}   
test.innerHTML += text; 
totalID.innerHTML = total;
var marks = document.querySelectorAll(".marks");
var answers__sList__item = document.querySelectorAll('.answers__sList__item');
for(let q = 0; q < answers__sList__item.length; q++){
    answers__sList__item[q].addEventListener("click", () => {
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