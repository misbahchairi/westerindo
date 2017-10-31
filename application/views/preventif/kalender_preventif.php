
  <div class="content-wrapper">
  
    <section class="content-header">
      <h1>
        Kalender Kegiatan
        <small>prefentif</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kalender Kegiatan</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->

<?php 
  $json = "";
  foreach ($preventif->result() as $dt): 
  

    for ($i=0; $i < 2000; $i+=$dt->reccurent) { 
      $date = date("Y-m-d", strtotime("+".$i." day", strtotime($dt->tgl_kegiatan)));
      
      $day = date('d',strtotime($date));
      $month = date('m',strtotime($date)) - 1;
      $year = date('Y',strtotime($date));

      if ($dt->kategori == 1) {
       $color = "#3ab1c9";
      } elseif ($dt->kategori == 2) {
        $color = "#b75500";
      } elseif ($dt->kategori == 4) {
        $color = "#00b733";
      } elseif ($dt->kategori == 5) {
        $color = "#b70000";
      }
      
      $json = $json."{
      title: '".$dt->judul."',
      start: new Date(".$year.", ".$month.", ".$day."),
      backgroundColor: '".$color."',
      borderColor: '".$color."',
      url : '".base_url('preventif/detail/').$dt->id_preventif."'
      },";
    }  

  endforeach
?>

  <!-- fullCalendar 2.2.5 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="<?=base_url('assets');?>/plugins/fullcalendar/fullcalendar.min.js"></script>
  <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            <?=$json?>
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".fc-time").addClass("hide");
        });
    </script>