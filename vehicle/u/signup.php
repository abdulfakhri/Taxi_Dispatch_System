<?php include ('../c/c.php');?>
<?php include ('../c/m.php');?>
<?php include ('nav.php');?>
<?php include ($createdriverapi);?>


  <div class="container">
      
  
       <div class="title">Driver & Car Registeration</div>
    <hr>
        
                   
                    <form action=""  name="" method="POST">
                        
                      
                                    <label></label>
                                    <input type="text" placeholder="Driver Name" name=<?php echo $dv1;?> required />
                                    <label> </label>
                                    <input name="<?php echo $dv2;?>" type="text" value="" placeholder="Driver Phone No" required />
                                   <label> </label>
                                   <input type="text" placeholder="Driver Email" name="<?php echo $dv3;?>" required>
                                     <label></label>
                                     <input type="text" placeholder="Home Address" name="<?php echo $dv4;?>" required><br>
                                      
                                  
                                      <label>Taxi Company</label>
                                    <p><?PHP include('../m/listcompanies.php');?></p>  
                               
                                     <label></label>
                                     <input type="text" placeholder="Driving License#" name="<?php echo $dv7;?>" required>
                                     <label></label>
                                     <input type="text" placeholder="Operator License#" name="<?php echo $dv8;?>" required><br>
                                    
                                    <label> </label>
                                   <input type="text" placeholder="Driver Username" name="<?php echo $dv9;?>" required>
                                   
                                   <label> </label>
                                   <input type="text" placeholder="Password" name="<?php echo $dv10;?>" required><br>
                                   
                                    <label>Driver Level</label><select class="input" name="<?php echo $dv11;?>">
                                         <option>Level 1</option>
                                         <option>Level 2</option>
                                         <option>Level 3</option>
                                         <option>Level 4</option>
                                         <option>Level 5</option>
                                         <option>Level 6</option>
                                         <option>Level 7</option>
                                     </select>
                                     
                                 
                                    
                                     
                            
                         
                        <hr>
                        
                       
                                    <p><label>Car Details</label></p>
                                    <label></label>
                                    <input type="text" placeholder="Number" name="number" required />
                                    <label></label>
                                    <input name="call_sign" type="text" value="" placeholder="Call Sign" required /><br>
                                    <label>Wheel Chair</label><select class="input" name="wheelchair">
                                         <option>0</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                        </select>

                                       <label>Bags</label><select class="input" name="bags">
                                         <option>0</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                        </select>
                                      <br>
                                     <label>Type</label><select class="input" name="type">
                                         <option>Sedan</option>
                                         <option> Station wagon</option>
                                         <option>Compact</option>
                                         <option>Black cab</option>
                                         <option> SUV</option>
                                         <option>Bus</option>
                                         <option>Minibus</option>
                                         <option>Van</option>
                                         <option>Minivan</option>
                                         <option>Limousine</option>
                                         <option>Stretch Limousine</option>
                                         <option> Golf cart</option>
                                         <option>Ambulance</option>
                                     </select>
                               
                               
                                     <label>Passenger#</label><select class="input" name="passenger">
                                         
                                         <option>0</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         
                                         <option>8</option>
                                         <option>9</option>
                                         
                                          <option>10</option>
                                         <option>11</option>
                                         <option>12</option>
                                         <option>13</option>
                                         
                                         <option>14</option>
                                         <option>15</option>
                                         <option>16</option>
                                         <option>17</option>
                                         
                                         <option>18</option>
                                         <option>19</option>
                                         
                                          <option>20</option>
                                         <option>21</option>
                                         <option>22</option>
                                         <option>23</option>
                                         
                                         <option>24</option>
                                         <option>25</option>
                                         <option>26</option>
                                         <option>27</option>
                                         
                                         <option>28</option>
                                         <option>29</option>
                                         
                                          <option>30</option>
                                         <option>31</option>
                                         <option>32</option>
                                         <option>33</option>
                                         
                                         <option>34</option>
                                         <option>35</option>
                                         <option>36</option>
                                         <option>37</option>
                                         
                                         <option>38</option>
                                         <option>39</option>
                                         
                                          <option>40</option>
                                         
                                         
                                     </select>
  
                                    <label>Color</label><select class="input" name="color">
                                         
                                         <option>Yellow</option>
                                         <option>  Red</option>
                                         <option> Green</option>
                                         <option>Blue</option>
                                         <option> Black</option>
                                         <option>White</option>
                                         <option>Orange</option>
                                         <option>Pink</option>
                                         <option>Silver</option>
                                        
                                     </select>
                                    
                                    
                                    <label> </label>
                                   <input type="text" placeholder="License Plate" name="license_plate" required>
                                 
                                    <label>Image</label><select class="input" name="image">
                                         <option>Sedan</option>
                                         <option>Station wagon</option>
                                         
                                         <option>Minibus</option>
                                         <option>Compact</option>
                                         <option>Bus</option>
                                         <option>Moped</option>
                                         <option>Truck</option>
                                         
                                         <option>Tow truck</option>
                                         <option>Compact</option>
                                         <option>SUV</option>
                                         <option>Tuk-tuk</option>
                                        
                                     </select>

                                     <?PHP echo $reg; ?>
                                     <hr>
                                     <button type="submit"  class="btn btn-default" name='createdriver'>Register</button>
                                     <button type="reset" class="btn btn-default">Clear Form </button>
                            </div>
                            
                    </form> 
                    
        </div>
          
   
<?php include ($ft);?>
       