document.addEventListener("DOMContentLoaded",() =>{


const currentDate = document.querySelector(".current-date");
daysTag = document.querySelector(".days");
prevNextIcon = document.querySelectorAll(".arrow-left , .arrow-right");


//新しい日付
let date = new Date();
currYear = date.getFullYear();
currMonth = date.getMonth();

//月の配列
const months = ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"];

//カレンダの作成
const renderCalendar = () => {
    const firstDayofMonth = new Date(currYear, currMonth, 1).getDay(); //月の最初の日
    const lastDateofMonth = new Date(currYear, currMonth +1, 0).getDate(); //月の最後の日付
    const lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(); //月の最後の日
    const lastDateofPrevMonth = new Date(currYear, currMonth, 0).getDate(); //前の月の最後の日付
    let liTag = "";

    //前の月の最後の日を加える
    for (let i = firstDayofMonth; i > 0; i--) {
        liTag += `<li class="inactive">${lastDateofPrevMonth -i + 1 }</li>`;
        
    }

    //月の日を加える
    for (let i = 1; i<= lastDateofMonth; i ++){
        //現在の日付と紐つけて、li にactive classを付け加える
        let isToday = i === date.getDate() && currMonth === new Date().getMonth()
                        && currYear === new Date().getFullYear()?"active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    //次の月の日を加える
    for(let i = lastDayofMonth; i < 6; i++){
        liTag += `<li class="inactive">${i - lastDayofMonth + 1 }</li>`;
    }

    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;

}

renderCalendar();

//カレンダの操作のクリックイベント
prevNextIcon.forEach(icon => {
    icon.addEventListener("click",() =>{
        currMonth = icon.id === "prev" ? currMonth - 1: currMonth + 1;
        
        //年の調整する
        if (currMonth < 0){
            currMonth = 11;
            currYear -= 1;
        }else if (currMonth > 11){
            currMonth = 0;
            currYear += 1;
        }
        renderCalendar();
    });
});


});


//Goal
document.addEventListener("DOMContentLoaded",function(){
    const inputBox = document.getElementById("input-box");
    const editGoalButton = document.getElementById("edit-goal-button");


    let isEditing = false;

    //ボタン
    editGoalButton.addEventListener("click",function(){
        if(!isEditing){
            //編集可能にする
            inputBox.removeAttribute("readonly");
            inputBox.focus();
            editGoalButton.innerHTML =  `<img src="/public/assets/img/edit.png" height="40px" width="40px">`;
            isEditing = true;
        }else{
            //新しいゴールを編集する
            const newGoal = inputBox.value;

            if (!newGoal.trim()) {
                alert("Goal cannot be empty!");
                return;
            }
            

            //編集後のゴールをサーバーに送信する
            fetch("/goal/update",{
                method:"POST",
                headers:{
                    "Content-Type": "application/json",
                    "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),

                },
                body: JSON.stringify({goal: newGoal}),
            })

            .then((response) => response.json())
            
            .then((data) => {
                if(data.success){
                    alert("Goal updated successfully!");
                } else{
                    alert("Failed to update the goal.");
                }
            })
            .catch((error) => {
                console.error("Error:",error);
            });

            //編集不可にする
            inputBox.setAttribute("readonly","readonly");
            editGoalButton.innerHTML =  `<img src="/public/assets/img/edit.png" height="40px"; width="40px">`;
            isEditing = false;
        }
    });
});