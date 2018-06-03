 @inject('data','App\Helps')

               @foreach($appliedId as $val)
                @php
                $personalInformation =  $data->personalInformationdetails($val->user_id,$val->job_id);
                @endphp
                <tr>
                  <td><input type="checkbox" class="all_data" name="alldata[]" value="{{ $val->id }}"></td>
                  <td>{{ $val->letter }}</td>
                  <td>{{ $personalInformation->fore_name }}</td>
                </tr>
                  @endforeach
               
              