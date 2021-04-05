<div class="form-outline" style="margin-bottom: 20px;">
  <input type="text" id="txtfirstname" class="form-control" />
  <label class="form-label" for="form1">Firstname</label>
</div>

<div class="form-outline" style="margin-bottom: 20px;">
  <input type="text" id="txtlastname" class="form-control" />
  <label class="form-label" for="form1">Lastname</label>
</div>

<div style="display: inline;">
    <div class="form-check">
    <input
        class="form-check-input"
        type="radio"
        name="flexRadioDefault"
        id="radiomale"
        onchange="malechange()"
        
    />
    <label class="form-check-label" for="flexRadioDefault1"> Male </label>
    </div>
    
    <div class="form-check">
    <input
    class="form-check-input"
    type="radio"
    name="flexRadioDefault"
    id="radiofemale"
    onchange="femalechange()"
    />
    <label class="form-check-label" for="flexRadioDefault1"> Female </label>
    </div>
</div>

<div class="form-outline" style="margin-top: 20px;">
  <textarea class="form-control" id="textaddress" rows="4"></textarea>
  <label class="form-label" for="textAreaExample">Address</label>
</div>

<hr>

<div class="form-outline" style="margin-bottom: 20px;">
  <input type="text" id="txtusername" class="form-control" />
  <label class="form-label" for="form1">Username</label>
</div>

<div class="form-outline" style="margin-bottom: 20px;">
  <input type="password" id="txtpassword" class="form-control" />
  <label class="form-label" for="form1">Password</label>
</div>

<div class="form-outline" style="margin-bottom: 20px;">
  <input type="password" id="txtconfirm" class="form-control" />
  <label class="form-label" for="form1">Confirm Password</label>
</div>



<button class="btn btn-primary" onclick="onregister()" style="float:right; margin-bottom: 10px;">Register</button>
<button class="btn btn-primary" onclick="navigatesignin()"style="float:right; margin-bottom: 10px; margin-right: 10px;">Already have an account?</button>

