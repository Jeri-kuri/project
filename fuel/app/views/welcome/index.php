
<?php
use Fuel\Core\Security;  
?>

<!DOCTYPE html>
<html>
<head>
    <title>KIN TORE</title>
    <meta name="csrf-token" content="<?= Security::fetch_token(); ?>">
    <link rel="stylesheet" href="/assets/css/index-layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    

</head>
<body>
<!--　ページのヘッダー　-->
    <div class="top">
        <h3>KIN TORE</h3>
        <button class="logout-button">LOGOUT</button>
    </div>
    <hr class ="custom-divider">

    <div class ="welcome">
        <h3>WELCOME USER</h3>
    </div>

<!--ゴール記入欄-->
    <div class = "goal-container">
        <h1>目標:</h1>
        <input type="text" class="input-box" id="input-box" placeholder="目標を記入" readonly>
        <button class="input-button" id= "edit-goal-button">
             <img src="<?php echo Asset::get_file('edit.png','img');?>" height="40px" width="40px" alt="Edit">
        </button>
    </div>p

<div class = "header-wrapper">
<!--カレンダー-->
    <div class ="header-container">
                <button id="prev" class="arrow-left">
                    <img src="/assets/img/arrow.png" height="30px"; width="30px">
                </button> 
                
                <p class="current-date">12月</p>
                
                <button id="next" class="arrow-right">
                    <img src="/assets/img/right-arrow.png" height="30px"; width="30px">
                </button>
    </div>

<!--登録した日のカウンターとビッグ３を表示する-->
    <div class = "counter-container">
        <p class= "counter">9回</p>
    </div>

    <div class="weight-container">
        <p class = "CurWeight"> 体重 87kg</p>
    </div>
    <div class="big3-container">
        <p class = "CurBig3"> BIG 3  400 kg</p>
    </div>
</div>    
    
<div class="calendar-log-container">
    <div class="wrapper">
        <div class="calendar">
            
            <ul class="weeks">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
            </ul>
            <ul class="days">
            </ul>
        </div>   
    </div>
<!--ログの記録を表示できる-->
    <div class="scrollable-container">
        <div class="log-data">
            <h2 id="date-log">12月2日</h2>
            <h2 id="training-log">胸トレ</h2>
        </div>

        <div class= "menu-wrapper">
            <h3 id ="exercise-name">ベンチプレス</h3>
                <div class = rep-wrapper>
                    <div class="set">
                        <span class ="weight">35kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">50kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">80kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
             </div>
             <h3 id ="exercise-name">ベンチプレス</h3>
                <div class = rep-wrapper>
                    <div class="set">
                        <span class ="weight">35kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">50kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">80kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
             </div>
             <h3 id ="exercise-name">ベンチプレス</h3>
                <div class = rep-wrapper>
                    <div class="set">
                        <span class ="weight">35kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">50kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
                    <div class="set">
                        <span class ="weight">80kg</span> 
                        <span class="separator">&nbsp;x&nbsp;</span>
                        <span class ="reps">3reps</span>
                    </div>
             </div>
        </div>
    </div>
</div>

<div class="nav-bar">
    <button class="nav-button" data-training="chest">胸</button>
    <button class="nav-button" data-training="shoulders">肩</button>
    <button class="nav-button" data-training="back">背中</button>
    <button class="nav-button" data-training="legs">足</button>
    <button class="nav-button" data-training="arms">腕</button>
</div>

<div class="input-container">
    <div class= "training-container" >
        <div class="form-container">
            <form id="training-form">
<!--種目のインプット-->
            <div class="training-name-wrapper">
                <div class="training-name-container">
                    <input type="text" id="name" name="name" placeholder="種目" required>
                </div>

                <button type="delete" class="deletion">
                    <img src="/assets/img/x-mark.png" height="40px"; width="40px">
                </button>
            </div>

            <div class="weight-rep-wrapper">
                <div class="training-details">
                    <div class="sets">
                        <span class="set-num">1</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                      <span class="separator">&nbsp;x&nbsp;</span>
                        <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    <div class="sets">
                        <span class="set-num">2</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                        <span class="separator">&nbsp;x&nbsp;</span>
                         <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    
                </div>
                
                <button type="add-set" class ="add-rep">
                    <img src="/assets/img/add.png" height="40px"; width="40px">
                </button>
            </div>
            <div class="training-name-wrapper">
                <div class="training-name-container">
                    <input type="text" id="name" name="name" placeholder="種目" required>
                </div>

                <button type="delete" class="deletion">
                    <img src="/assets/img/x-mark.png" height="40px"; width="40px">
                </button>
            </div>

            <div class="weight-rep-wrapper">
                <div class="training-details">
                    <div class="sets">
                        <span class="set-num">1</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                      <span class="separator">&nbsp;x&nbsp;</span>
                        <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    <div class="sets">
                        <span class="set-num">2</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                        <span class="separator">&nbsp;x&nbsp;</span>
                         <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    
                </div>
                
                <button type="add-set" class ="add-rep">
                    <img src="/assets/img/add.png" height="40px"; width="40px">
                </button>
            </div>
            <div class="training-name-wrapper">
                <div class="training-name-container">
                    <input type="text" id="name" name="name" placeholder="種目" required>
                </div>

                <button type="delete" class="deletion">
                    <img src="/assets/img/x-mark.png" height="40px"; width="40px">
                </button>
            </div>

            <div class="weight-rep-wrapper">
                <div class="training-details">
                    <div class="sets">
                        <span class="set-num">1</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                      <span class="separator">&nbsp;x&nbsp;</span>
                        <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    <div class="sets">
                        <span class="set-num">2</span>
                        <input type="number" id="weight" name="weight" placeholder="重量" required>
                        <span class="separator">&nbsp;x&nbsp;</span>
                         <input type="number" id="reps" name="reps" placeholder="レップ数" required>
                    </div>
                    
                </div>
                
                <button type="add-set" class ="add-rep">
                    <img src="/assets/img/add.png" height="40px"; width="40px">
                </button>
            </div>
                <button type="" class="add-set">追加</button>
                <button type="submit" class="submit-button">完了</button>

            </form>
        </div>
    </div>

    <div class = "weight-input">
        <form id = weight-form>
            <div class = weight-input-container>
                <label for="weight"> 体  重</label>
            </div>
            <input type="number" id="user-weight" required></form>
            <button type="submit" class="submit-weight-button">完了</button>
        </form>
    </div>
</div>    

<script src="/assets/js/script.js"></script>
<script src="/assets/js/goal.js"></script>



</body>
</html>
