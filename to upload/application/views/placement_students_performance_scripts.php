<!-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
    <script type="text/javascript" src="<?php //echo base_url();?>js/jchartfx.full.js"></script>-->

   <script type="text/javascript" src="<?php echo base_url();?>js/jchartfx.system.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>js/jchartfx.coreVector.js"></script>
   

<script type="text/javascript">


function create(data){
    $('#div_obj').html('');
delete chart1;
	 chart1 = new cfx.Chart(); 
// if(data=='')
// PopulateData(chart1);
// else{
chart1.setDataSource(data);
// }
var titles = chart1.getTitles();
var title = new cfx.TitleDockable();


chart1.getAxisY().getLabelsFormat().setDecimals(2);
//title.setText("Marks shows your performance in an exam not who you are");
titles.add(title); 
chart1.getAxisX().setStaggered(false);
chart1.getAxisY().setMax(100);
chart1.getAxisY().setMin(0);
chart1.getAxisY().setStep(5);
chart1.getAxisY().setForceZero(false);
chart1.create('div_obj');
 }
// function PopulateData(chart1) {
//         var items = [{
//             "You": 78.89,
//             "Class Average": 85.3,
//             "Semester": "I&II"
//         }, {
//             "You": 76.69,
//             "Class Average": 72.4,
            
//             "Semester": "III"
//         }, {
//            "You": 73.1,
//             "Class Average": 78,
            
//             "Semester": "IV"
//         }, {
//            "You": 75,
//             "Class Average": 80,
            
//             "Semester": "V"
//         }, {
//             "You": 80,
//             "Class Average": 75,
            
//             "Semester": "VI"
//          }//, {
//         //     "You": 0,
//         //     "Class Average": 0,
//         //     "SUV": 0,
//         //     "Semester": "VII"
//         // }, {
//         //     "You": 0,
//         //     "Class Average": 0,
//         //     "SUV": 0,
//         //     "Semester": "VIII"
//         // }
//         ];
    
//     console.log(items);
//         chart1.setDataSource(items);
//     }



</script>

