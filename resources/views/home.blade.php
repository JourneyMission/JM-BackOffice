@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Area Chart Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i>
            Travel statistics in each period.
          </div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

        <div class="row">

          <div class="col-lg-8">

            <!-- Example Bar Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Ranking of mission category
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    <div class="h4 mb-0 text-primary">34,693</div>
                    <div class="small text-muted">YTD Revenue</div>
                    <hr>
                    <div class="h4 mb-0 text-warning">18,474</div>
                    <div class="small text-muted">YTD Expenses</div>
                    <hr>
                    <div class="h4 mb-0 text-success">16,219</div>
                    <div class="small text-muted">YTD Margin</div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>

            
              

              

           

          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Score Team
              </div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            The score of traveler
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Team</th>
                    <th>Number of Badge</th>
                    <th>Score</th>
                    <th>Last update</th>
                    
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td><font color="red">Red</font></td>
                    <td>6</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td><font color="red">Red</font></td>
                    <td>8</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                  
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td><font color="red">Red</font></td>
                    <td>0</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                  
                  </tr>
                  <tr>
                    <td>Herrod Chandler</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    
                  </tr>
                  <tr>
                    <td>Rhona Davidson</td>
                    <td><font color="red">Red</font></td>
                    <td>5</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    
                  </tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td><font color="red">Red</font></td>
                    <td>9</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    
                  </tr>
                  <tr>
                    <td>Sonya Frost</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>23</td>
                    <td>2008/12/13</td>
                    
                  </tr>
                  <tr>
                    <td>Jena Gaines</td>
                    <td><font color="red">Red</font></td>
                    <td>5</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                 
                  </tr>
                  <tr>
                    <td>Quinn Flynn</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                  
                  </tr>
                  <tr>
                    <td>Charde Marshall</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    
                  </tr>
                  <tr>
                    <td>Haley Kennedy</td>
                    <td><font color="red">Red</font></td>
                    <td>6</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                  
                  </tr>
                  <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>19</td>
                    <td>2010/03/17</td>
               
                  </tr>
                  <tr>
                    <td>Michael Silva</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>66</td>
                    <td>2012/11/27</td>
                
                  </tr>
                  <tr>
                    <td>Paul Byrd</td>
                    <td><font color="red">Red</font></td>
                    <td>5</td>
                    <td>64</td>
                    <td>2010/06/09</td>
                    
                  </tr>
                  <tr>
                    <td>Gloria Little</td>
                    <td><font color="blue">Blue</font></td>
                    <td>9</td>
                    <td>59</td>
                    <td>2009/04/10</td>
                  
                  </tr>
                  <tr>
                    <td>Bradley Greer</td>
                    <td><font color="blue">Blue</font></td>
                    <td>4</td>
                    <td>41</td>
                    <td>2012/10/13</td>
                    
                  </tr>
                  <tr>
                    <td>Dai Rios</td>
                    <td><font color="blue">Blue</font></td>
                    <td>56</td>
                    <td>35</td>
                    <td>2012/09/26</td>
                  
                  </tr>
                  <tr>
                    <td>Jenette Caldwell</td>
                    <td><font color="blue">Blue</font></td>
                    <td>5</td>
                    <td>30</td>
                    <td>2011/09/03</td>
                   
                  </tr>
                  <tr>
                    <td>Yuri Berry</td>
                    <td><font color="blue">Blue</font></td>
                    <td>5</td>
                    <td>40</td>
                    <td>2009/06/25</td>
                   
                  </tr>
                  <tr>
                    <td>Caesar Vance</td>
                    <td><font color="blue">Blue</font></td>
                    <td>67</td>
                    <td>21</td>
                    <td>2011/12/12</td>
                    
                  </tr>
                  <tr>
                    <td>Doris Wilder</td>
                    <td><font color="blue">Blue</font></td>
                    <td>6</td>
                    <td>23</td>
                    <td>2010/09/20</td>
                    
                  </tr>
                  <tr>
                    <td>Angelica Ramos</td>
                    <td><font color="blue">Blue</font></td>
                    <td>8</td>
                    <td>47</td>
                    <td>2009/10/09</td>
                    
                  </tr>
                  <tr>
                    <td>Gavin Joyce</td>
                    <td><font color="blue">Blue</font></td>
                    <td>34</td>
                    <td>42</td>
                    <td>2010/12/22</td>
                   
                  </tr>
                  <tr>
                    <td>Jennifer Chang</td>
                    <td><font color="blue">Blue</font></td>
                    <td>24</td>
                    <td>28</td>
                    <td>2010/11/14</td>
                    
                  </tr>
                  <tr>
                    <td>Brenden Wagner</td>
                    <td><font color="blue">Blue</font></td>
                    <td>34</td>
                    <td>28</td>
                    <td>2011/06/07</td>
                    
                  </tr>
                  <tr>
                    <td>Fiona Green</td>
                    <td><font color="blue">Blue</font></td>
                    <td>2</td>
                    <td>48</td>
                    <td>2010/03/11</td>
                    
                  </tr>
                  <tr>
                    <td>Shou Itou</td>
                    <td><font color="blue">Blue</font></td>
                    <td>3</td>
                    <td>20</td>
                    <td>2011/08/14</td>
                    
                  </tr>
                  <tr>
                    <td>Michelle House</td>
                    <td><font color="blue">Blue</font></td>
                    <td>3</td>
                    <td>37</td>
                    <td>2011/06/02</td>
                   
                  </tr>
                  <tr>
                    <td>Suki Burks</td>
                    <td><font color="blue">Blue</font></td>
                    <td>3</td>
                    <td>53</td>
                    <td>2009/10/22</td>
                    
                  </tr>
                  <tr>
                    <td>Prescott Bartlett</td>
                    <td><font color="blue">Blue</font></td>
                    <td>2</td>
                    <td>27</td>
                    <td>2011/05/07</td>
                    
                  </tr>
                  <tr>
                    <td>Gavin Cortez</td>
                    <td><font color="blue">Blue</font></td>
                    <td>23</td>
                    <td>22</td>
                    <td>2008/10/26</td>
                    
                  </tr>
                  <tr>
                    <td>Martena Mccray</td>
                    <td><font color="blue">Blue</font></td>
                    <td>33</td>
                    <td>46</td>
                    <td>2011/03/09</td>
                   
                  </tr>
                  <tr>
                    <td>Unity Butler</td>
                    <td><font color="blue">Blue</font></td>
                    <td>33</td>
                    <td>47</td>
                    <td>2009/12/09</td>
                    
                  </tr>
                  <tr>
                    <td>Howard Hatfield</td>
                    <td><font color="blue">Blue</font></td>
                    <td>3</td>
                    <td>51</td>
                    <td>2008/12/16</td>
                   
                  </tr>
                  <tr>
                    <td>Hope Fuentes</td>
                    <td><font color="blue">Blue</font></td>
                    <td>3</td>
                    <td>41</td>
                    <td>2010/02/12</td>
                   
                  </tr>
                  <tr>
                    <td>Vivian Harrell</td>
                    <td><font color="red">Red</font></td>
                    <td>44</td>
                    <td>62</td>
                    <td>2009/02/14</td>
                   
                  </tr>
                  <tr>
                    <td>Timothy Mooney</td>
                    <td><font color="red">Red</font></td>
                    <td>55</td>
                    <td>37</td>
                    <td>2008/12/11</td>
                    
                  </tr>
                  <tr>
                    <td>Jackson Bradshaw</td>
                    <td><font color="red">Red</font></td>
                    <td>24</td>
                    <td>65</td>
                    <td>2008/09/26</td>
                   
                  </tr>
                  <tr>
                    <td>Olivia Liang</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>64</td>
                    <td>2011/02/03</td>
                    
                  </tr>
                  <tr>
                    <td>Bruno Nash</td>
                    <td><font color="red">Red</font></td>
                    <td>33</td>
                    <td>38</td>
                    <td>2011/05/03</td>
                   
                  </tr>
                  <tr>
                    <td>Sakura Yamamoto</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>37</td>
                    <td>2009/08/19</td>
                    
                  </tr>
                  <tr>
                    <td>Thor Walton</td>
                    <td><font color="red">Red</font></td>
                    <td>33</td>
                    <td>61</td>
                    <td>2013/08/11</td>
                    
                  </tr>
                  <tr>
                    <td>Finn Camacho</td>
                    <td><font color="red">Red</font></td>
                    <td>34</td>
                    <td>47</td>
                    <td>2009/07/07</td>
                   
                  </tr>
                  <tr>
                    <td>Serge Baldwin</td>
                    <td><font color="red">Red</font></td>
                    <td>13</td>
                    <td>64</td>
                    <td>2012/04/09</td>
                    
                  </tr>
                  <tr>
                    <td>Zenaida Frank</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>63</td>
                    <td>2010/01/04</td>
                    
                  </tr>
                  <tr>
                    <td>Zorita Serrano</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>56</td>
                    <td>2012/06/01</td>
                   
                  </tr>
                  <tr>
                    <td>Jennifer Acosta</td>
                    <td><font color="red">Red</font></td>
                    <td>0</td>
                    <td>43</td>
                    <td>2013/02/01</td>
                    
                  </tr>
                  <tr>
                    <td>Cara Stevens</td>
                    <td><font color="red">Red</font></td>
                    <td>1</td>
                    <td>46</td>
                    <td>2011/12/06</td>
                    
                  </tr>
                  <tr>
                    <td>Hermione Butler</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>47</td>
                    <td>2011/03/21</td>
                    
                  </tr>
                  <tr>
                    <td>Lael Greer</td>
                    <td><font color="red">Red</font></td>
                    <td>34</td>
                    <td>21</td>
                    <td>2009/02/27</td>
                    
                  </tr>
                  <tr>
                    <td>Jonas Alexander</td>
                    <td><font color="red">Red</font></td>
                    <td>10</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    
                  </tr>
                  <tr>
                    <td>Shad Decker</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>51</td>
                    <td>2008/11/13</td>
                    
                  </tr>
                  <tr>
                    <td>Michael Bruce</td>
                    <td><font color="red">Red</font></td>
                    <td>4</td>
                    <td>29</td>
                    <td>2011/06/27</td>
                    
                  </tr>
                  <tr>
                    <td>Donna Snider</td>
                    <td><font color="red">Red</font></td>
                    <td>2</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                   
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
@endsection
