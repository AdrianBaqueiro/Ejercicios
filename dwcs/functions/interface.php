<?php

  function menuBarI($title,$file){
    print('
    <nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
			      <a class="navbar-brand" href ="">'.$title.'</a>
		    </div>
			<form method="POST" action="'.$file.'">
				<input type="hidden" name="action"/>
				<ul class="nav navbar-nav">



    ');
  }
  function menuBarF(){
    print ('
    	       </ul>
            </form>
            </div>
          </nav>
    ');
  }
  function menuItems($option)
  {
    print('
    <li class="dropdown">
      <input class=" btn btn-link navbar-btn" type="submit" name="submit" value="'.$option.'" />
    </li>
    ');
  }


  function createInput($name){
    print('
				<div  class="input-group">
					<span class="input-group-addon">'.$name.'</span>
					<input type="text" name="'.$name.'" class="form-control"  />
				</div>
    ');
  }
function formI($title,$file){
  print('<form method="POST"  class="well"  action="'.$file.'">
      <h2>'.$title.'</h2>
  ');

}
function formF($name)
{
print('
  <input class="btn btn-default navbar-btn" type="submit" value="'.$name.'" class="btn-group" />
</form>');


}

function crearSelectNum($name,$num,$selNum){
  print('
    <div  class="input-group">
    <span class="input-group-addon">'.$name.'</span>
      <select name="'.$name.'" class="form-control" onChange="this.form.submit()">
  ');
          for($i=1;$i<=$num;$i++)
          {
            if($i == $selNum)
              echo "<option value=".$i." selected>".$i."</option>";
              else {
                echo "<option value=".$i." >".$i."</option>";
              }
          }
  print('
      </select>
    </div>

  ');

}







 ?>
