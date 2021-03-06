
<style type="text/css">
 .analtic
 {
 	/*alignment-adjust: central;*/
 	alignment-adjust: central;
 }
 .google_analytics{
 	width:auto !important;
 	min-height:300px;
 	float:left;
 	margin: 20px;
 }
 .google_analytics h2{
 	margin-bottom:20px;
 }
 .Chartjs-legend > li {
  display: inline-block;
  padding: .25em .5em;
}
.Chartjs-legend > li > i {
  display: inline-block;
  height: 1em;
  margin-right: .5em;
  vertical-align: -.1em;
  width: 1em;
}
.ViewSelector2-item{
	float: left;
	margin:0 10px;
}
#view-selector-container{
	width:100%;
	overflow: hidden;
}
.account
{
margin-top: 43px !important;
  margin-bottom: 37px !important;
  margin-left: 7px !important;
}
.active_count
{
	  margin-left: 638px;
  margin-top: -53px;
  margin-bottom: 15px;
  position: absolute;
}
.view_contain
{
	  margin-left: 91px;
	    margin-bottom: 30px;
	
}
.FormField
{
	margin-left: 11px;
}
.submit_code
{
	  margin-left: 262px;
  position: absolute;
}
.how_to
{
	margin-left: 723px;
  position: absolute;
  margin-top: -44px;
}
</style>

        <!-- Load jQuery and jQuery-Validate scripts -->
      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
        <script>
    	$(document).ready(function()
{

	$("#google_analytics").validate({
     rules: {
                google_analytics: { 
                	required: true, 
                
                	}
             
            },
     messages: {
                  google_analytics: {
                  	required: "Please enter the Google Account Client ID.",
              
                  	}
               }

});
});
</script>


<?php 
// header('X-Frame-Options: SAMEORIGIN'); 
 $google_analyze = $this->db->select('transaction_id')->get('google_analytics')->row()->transaction_id;
 
?>
	<?php
		//Show Flash Message
		if($msg = $this->session->flashdata('flash_message'))
		{
			echo $msg;
		}
		
	  ?>
<script>
	$(document).ready(function(){
		$('.message').fadeOut(5000);
	});
</script>

<div class="container-fluid top-sp body-color">
	<div class="">
	<div class="col-xs-12 col-md-12 col-sm-12">
<h1 class="page-header1">Google analytics</h1>
</div>
<form name="google_analytics" id="google_analytics" method="post" action="">
	<div class="col-xs-12 col-md-12 col-sm-12">
<table class="table tablet1" cellpadding="2" cellspacing="0">
	<tr>
		<td>
		</td>
		<td>
		<?php echo '<br><br>'.translate_admin('Google Account Client ID');?>
		</td>
	</tr>
 <tr>
  <td class="clsName"><?php echo translate_admin('Google Account Client ID'); ?><span class="clsRed"></span></td>
 
 
  <td><input type="text" size="50" name="google_analytics" value="<?php if(isset($google_analyze)) echo $google_analyze; ?>"></td>
 </tr>
<tr>
<td>&#160;</td>
<td><input type="submit"required="required" name="update" value="<?php echo translate_admin('Submit'); ?>" /></td></tr>
</table>
<!--
<li class="how_to" ><a href="https://developers.google.com/api-client-library/javascript/start/start-js#Setup"><?php echo translate_admin('How to Get the client ID'); ?></a></li>-->
  <div style="color:red;   position: absolute;
  margin-left: 703px; margin-top: -41px;" >
			<?php //echo form_error('google_analytics'); ?>
			</div>
</form>

<script type="text/javascript">

	
	
</script>

<script>
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>


<div id="embed-api-auth-container" class="account"></div>
<div id="view-selector-container" class="view_contain"></div>
<div id="active-users-container" class="active_count"></div>
<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<h2 class="fonts"><?php echo "This Week vs Last Week site traffic";?></h2>
<div id="chart-container"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<h2 class="fonts"><?php echo "Top Countries by Sessions Last 30 days";?></h2>
<div id="chart-1-contain"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
	<h2 class="fonts"><?php echo "This Week vs Last Week By sessions";?></h2>
<div id="chart-1-container"></div>
<div id="legend-1-container" class="Chartjs-legend"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<h2 class="fonts"><?php echo "This Year vs Last Year By users";?></h2>
<div id="chart-2-container"></div>
<div id="legend-2-container" class="Chartjs-legend"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<h2 class="fonts"><?php echo "Top Browsers By pageview";?></h2>
<div id="chart-3-container"></div>
<div id="legend-3-container" class="Chartjs-legend"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<h2 class="fonts"><?php echo "Top Countries By sessions";?></h2>
<div id="chart-4-container"></div>
<div id="legend-4-container" class="Chartjs-legend"></div>
</div>
</div>

<div class="col-xs-12 col-md-12 col-sm-12">
<div class="google_analytics">
<div id="chart-1-container"></div>
<div id="legend-1-container" class="Chartjs-legend"></div>
</div>

<div id="view-selector-1-container" style="display: none;" class="google_alalytics"></div>

</div></div>
<script type="text/javascript" src="<?php echo base_url();?>js/Chart.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/moment.min.js"></script>

<!-- Include the ViewSelector2 component script. -->

<!-- Include the ActiveUsers component script. -->
<script type="text/javascript" src="<?php echo base_url();?>js/active-users.js"></script>

<!-- Include the ViewSelector2 component script. -->
<script type="text/javascript" src="<?php echo base_url();?>js/view-selector2.js"></script>

<!-- Include the DateRangeSelector component script. -->
<script type="text/javascript" src="<?php echo base_url();?>js/date-range-selector.js"></script>

<script>

// == NOTE ==
// This code uses ES6 promises. If you want to use this code in a browser
// that doesn't supporting promises natively, you'll have to include a polyfill.

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '<?php echo $google_analyze; ?>',
  });






var viewSelector1 = new gapi.analytics.ViewSelector({
    container: 'view-selector-1-container'
  });



  // Render both view selectors to the page.
  viewSelector1.execute();



  /**
   * Create the first DataChart for top countries over the past 30 days.
   * It will be rendered inside an element with the id "chart-1-container".
   */
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 6,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'chart-1-contain',
      type: 'PIE',
      options: {
        width: '100%'
      }
    }
  });



  viewSelector1.on('change', function(ids) {
    dataChart1.set({query: {ids: ids}}).execute();
  });


  


  var activeUsers = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container',
    pollingInterval: 5
  });


  /**
   * Add CSS animation to visually show the when users come and go.
   */
  activeUsers.once('success', function() {
    var element = this.container.firstChild;
    var timeout;

    this.on('change', function(data) {
      var element = this.container.firstChild;
      var animationClass = data.delta > 0 ? 'is-increasing' : 'is-decreasing';
      element.className += (' ' + animationClass);

      clearTimeout(timeout);
      timeout = setTimeout(function() {
        element.className =
            element.className.replace(/ is-(increasing|decreasing)/g, '');
      }, 3000);
    });
  });


  /**
   * Create a new ViewSelector2 instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container',
  })
  .execute();


  /**
   * Update the activeUsers component, the Chartjs charts, and the dashboard
   * title whenever the user changes the view.
   */
  
  
  viewSelector.on('viewChange', function(data) { 
    var title = 'Google Analytics';
    title.innerHTML = data.property.name + ' (' + data.view.name + ')';

    // Start tracking active users for this view.
    activeUsers.set(data).execute();

    // Render all the of charts for this view.
    
    renderWeekOverWeekChart(data.ids);
    renderYearOverYearChart(data.ids);
   renderTopBrowsersChart(data.ids);
   renderTopCountriesChart(data.ids);
  });


  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });
  
    viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });

  

  /**
   * Draw the a chart.js line chart with data from the specified view that
   * overlays session data for the current week over session data for the
   * previous week.
   */
  function renderWeekOverWeekChart(ids) {

    // Adjust `now` to experiment with different days, for testing only...
    var now = moment(); // .subtract(3, 'day');

    var thisWeek = query({
      'ids': ids,
      'dimensions': 'ga:date,ga:nthDay',
      'metrics': 'ga:sessions',
      'start-date': moment(now).subtract(1, 'day').day(0).format('YYYY-MM-DD'),
      'end-date': moment(now).format('YYYY-MM-DD')
    });

    var lastWeek = query({
      'ids': ids,
      'dimensions': 'ga:date,ga:nthDay',
      'metrics': 'ga:sessions',
      'start-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'week')
          .format('YYYY-MM-DD'),
      'end-date': moment(now).subtract(1, 'day').day(6).subtract(1, 'week')
          .format('YYYY-MM-DD')
    });

    Promise.all([thisWeek, lastWeek]).then(function(results) {

      var data1 = results[0].rows.map(function(row) { return +row[2]; });
      var data2 = results[1].rows.map(function(row) { return +row[2]; });
      var labels = results[1].rows.map(function(row) { return +row[0]; });

      labels = labels.map(function(label) {
        return moment(label, 'YYYYMMDD').format('ddd');
      });

      var data = {
        labels : labels,
        datasets : [
          {
            label: 'Last Week',
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : data2
          },
          {
            label: 'This Week',
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : data1
          }
        ]
      };

      new Chart(makeCanvas('chart-1-container')).Line(data);
      generateLegend('legend-1-container', data.datasets);
    });
  }


  /**
   * Draw the a chart.js bar chart with data from the specified view that
   * overlays session data for the current year over session data for the
   * previous year, grouped by month.
   */
  function renderYearOverYearChart(ids) {

    // Adjust `now` to experiment with different days, for testing only...
    var now = moment(); // .subtract(3, 'day');

    var thisYear = query({
      'ids': ids,
      'dimensions': 'ga:month,ga:nthMonth',
      'metrics': 'ga:users',
      'start-date': moment(now).date(1).month(0).format('YYYY-MM-DD'),
      'end-date': moment(now).format('YYYY-MM-DD')
    });

    var lastYear = query({
      'ids': ids,
      'dimensions': 'ga:month,ga:nthMonth',
      'metrics': 'ga:users',
      'start-date': moment(now).subtract(1, 'year').date(1).month(0)
          .format('YYYY-MM-DD'),
      'end-date': moment(now).date(1).month(0).subtract(1, 'day')
          .format('YYYY-MM-DD')
    });

    Promise.all([thisYear, lastYear]).then(function(results) {
      var data1 = results[0].rows.map(function(row) { return +row[2]; });
      var data2 = results[1].rows.map(function(row) { return +row[2]; });
      var labels = ['Jan','Feb','Mar','Apr','May','Jun',
                    'Jul','Aug','Sep','Oct','Nov','Dec'];

      // Ensure the data arrays are at least as long as the labels array.
      // Chart.js bar charts don't (yet) accept sparse datasets.
      for (var i = 0, len = labels.length; i < len; i++) {
        if (data1[i] === undefined) data1[i] = null;
        if (data2[i] === undefined) data2[i] = null;
      }

      var data = {
        labels : labels,
        datasets : [
          {
            label: 'Last Year',
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : data2
          },
          {
            label: 'This Year',
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : data1
          }
        ]
      };

      new Chart(makeCanvas('chart-2-container')).Bar(data);
      generateLegend('legend-2-container', data.datasets);
    })
    .catch(function(err) {
      console.error(err.stack);
    })
  }


  /**
   * Draw the a chart.js doughnut chart with data from the specified view that
   * show the top 5 browsers over the past seven days.
   */
  function renderTopBrowsersChart(ids) {

    query({
      'ids': ids,
      'dimensions': 'ga:browser',
      'metrics': 'ga:pageviews',
      'sort': '-ga:pageviews',
      'max-results': 5
    })
    .then(function(response) {

      var data = [];
      var colors = ['#4D5360','#949FB1','#D4CCC5','#E2EAE9','#F7464A'];

      response.rows.forEach(function(row, i) {
        data.push({ value: +row[1], color: colors[i], label: row[0] });
      });

      new Chart(makeCanvas('chart-3-container')).Doughnut(data);
      generateLegend('legend-3-container', data);
    });
  }


  /**
   * Draw the a chart.js doughnut chart with data from the specified view that
   * compares sessions from mobile, desktop, and tablet over the past seven
   * days.
   */
  function renderTopCountriesChart(ids) {
    query({
      'ids': ids,
      'dimensions': 'ga:country',
      'metrics': 'ga:sessions',
      'sort': '-ga:sessions',
      'max-results': 5
    })
    .then(function(response) {

      var data = [];
      var colors = ['#4D5360','#949FB1','#D4CCC5','#E2EAE9','#F7464A'];

      response.rows.forEach(function(row, i) {
        data.push({
          label: row[0],
          value: +row[1],
          color: colors[i]
        });
      });

      new Chart(makeCanvas('chart-4-container')).Doughnut(data);
      generateLegend('legend-4-container', data);
    });
  }


  /**
   * Extend the Embed APIs `gapi.analytics.report.Data` component to
   * return a promise the is fulfilled with the value returned by the API.
   * @param {Object} params The request parameters.
   * @return {Promise} A promise.
   */
  function query(params) {
    return new Promise(function(resolve, reject) {
      var data = new gapi.analytics.report.Data({query: params});
      data.once('success', function(response) { resolve(response); })
          .once('error', function(response) { reject(response); })
          .execute();
    });
  }


  /**
   * Create a new canvas inside the specified element. Set it to be the width
   * and height of its container.
   * @param {string} id The id attribute of the element to host the canvas.
   * @return {RenderingContext} The 2D canvas context.
   */
  function makeCanvas(id) {
    var container = document.getElementById(id);
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    container.innerHTML = '';
    canvas.width = '450';
    canvas.height = '250';
    container.appendChild(canvas);

    return ctx;
  }


  /**
   * Create a visual legend inside the specified element based off of a
   * Chart.js dataset.
   * @param {string} id The id attribute of the element to host the legend.
   * @param {Array.<Object>} items A list of labels and colors for the legend.
   */
  function generateLegend(id, items) {
    var legend = document.getElementById(id);
    legend.innerHTML = items.map(function(item) {
      var color = item.color || item.fillColor;
      var label = item.label;
      return '<li><i style="background:' + color + '"></i>' + label + '</li>';
    }).join('');
  }


  // Set some global Chart.js defaults.
  Chart.defaults.global.animationSteps = 60;
  Chart.defaults.global.animationEasing = 'easeInOutQuart';
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.maintainAspectRatio = false;

});
</script>