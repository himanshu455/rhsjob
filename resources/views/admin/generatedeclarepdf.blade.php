 @inject('data','App\Helps')
  @inject('profdata','App\Helps')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style type="text/css" media="all">
.page-break {
    page-break-after: always;
}
</style>
</head>
<body>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            @if($Declaration)
                @foreach($Declaration as $declaration )
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                
                <tr>
                  <td><strong>I confirm that the information I have given on this application form is true and correct to the best of my knowledge.</strong></td>

                  <td>{{ $declaration->best_my_knowledge }}</td>
                </tr>
                <tr>
                  <td><strong>confirm that I am not on the DBS Children’s Barred List or DBS Adults’ Barred List and I am not disqualified from working
with children or subject to sanctions imposed by a regulatory body.</strong></td>
                  <td>{{ $declaration->i_am_not_disqualified }}</td>
                </tr>
                <tr>
                 <td><strong>understand that providing false information is an offence which could result in my application being rejected or (if the
false information comes to light after my appointment) summary dismissal and may amount to a criminal offence.</strong></td>
                   <td>{{ $declaration->providing_false_information }}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School processing the information given on this form, including any ‘sensitive’ information, as may be
necessary during the recruitment and selection process.</strong></td>
                   <td>{{ $declaration->recruitment_and_selection_process }}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with all previous employers where I have worked with children or
vulnerable adults to verify my reason for leaving that position.</strong></td>
                   <td>{{ $declaration->reason_for_leaving_that_position }}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with the people specified as my referees to verify the reference.</strong></td>
                   <td>{{ $declaration->verify_the_reference }}</td>
                </tr>
                 <tr>
                 <td><strong>Signature:</strong></td>
                   <td>{{ $declaration->signature }}</td>
                </tr>
                 <tr>
                 <td><strong>Date:</strong></td>
                   <td>{{ $declaration->signature_date }}</td>
                </tr>
              </table>
               @endforeach
                 @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</body>
</html>