<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='https://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
<table align='center' border='0' cellpadding='0' cellspacing='0' style='height:842px; width:700px;font-size:12px;'>
  <tr>
    <td valign='top'><table width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td valign='bottom' width='50%' height='50'><div align='left'><img src="{{asset("imgs/Logo-TR.png")}}" /></div><br /></td>

          <td width='50%'>&nbsp;</td>
        </tr>
      </table>Proposal To: <br/><br/>
      <table width='100%' cellspacing='0' cellpadding='0'>
      <tr>
        <td valign='top' width='35%' style='font-size:12px;'>
            <br />
            <div class="row">
<br>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Client Name:</strong>
                        {{ $client->first_name }} {{ $client->last_name }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Client Address:</strong>
                        {{ $addresse->province }}
                    </div>
                </div>

              <hr>

             <div class="col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <hr>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Home Number:</strong>
                    {{ $client->home_number }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Office Number:</strong>
                    {{ $client->office_number }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Mobile Number:</strong>
                    {{ $client->mobile_number }}
                </div>
            </div>

              <hr>

              </div>

</td>
        <td valign='top' width='35%'>
</td>
        <td valign='top' width='30%' style='font-size:12px;'>Proposal Validity Date: {{ $proposal->proposal_date }}<br/>
		 <br/>
		</td>

      </tr>
    </table>
    <table width='100%' height='100' cellspacing='0' cellpadding='0'>
      <tr>
        <td><div align='center' style='font-size: 14px;font-weight: bold;'>Proposal ID#  {{ $proposal->id }}</div></td>
      </tr>
    </table>
<table width='100%' cellspacing='0' cellpadding='2' border='1' bordercolor='#CCCCCC'>
      <tr>

        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Item Type</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Item NO</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Item Details</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>ES Width</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>ES Height</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>FN Width</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>FN Height</strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Creation Date</strong></td>

        </tr>
      <tr style="display:none;"><td colspan="*"><tr>
        @foreach ($proposal_details as $proposal_detail)
        <tr>
            <td>{{ $proposal_detail->item_type }}</td>
            <td>{{ $proposal_detail->item_no }}</td>
            <td>{{ $proposal_detail->item_details }}</td>
            <td>{{ $proposal_detail->es_width }}</td>
            <td>{{ $proposal_detail->es_height }}</td>
            <td>{{ $proposal_detail->fn_width }}</td>
            <td>{{ $proposal_detail->fn_height }}</td>
            <td>{{ $proposal_detail->created_at }}</td>
       </tr>
    @endforeach
    </tr>
    </table>
<table width='100%' cellspacing='0' cellpadding='2' border='0'>
    <br>
<tr>
        <td style='font-size:12px;width:50%;'><strong>ONE THOUSAND  ONE HUNDRED SIXTY THREE USD AND 44 CENTS</strong></td>
        <td><table width='100%' cellspacing='0' cellpadding='2' border='0'>

  <tr>
    <td  align='right' style='font-size:12px;'><b>Total</b></td>
    <td  align='right' style='font-size:12px;'><b> {{ $proposal->proposal_amount }} </b></td>
  </tr></table>
</td>
      </tr>
</table>

   <table width='100%' height='50'><tr><td style='font-size:12px;text-align:justify;'></td></tr></table>
    <table  width='100%' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='33%' style='border-top:double medium #CCCCCC;font-size:12px;' valign='top' ><b>[Company name]</b><br/>


</td>
        <td width='33%' style='border-top:double medium #CCCCCC; font-size:12px;' align='center' valign='top'>
[Company address line 1]<br />
[Company address line 2] <br/>
Phone: [Phone]<br/>
</td>

        <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;' align='right'> [payment details] <br/>
 </td>
      </tr>
    </table>
</td>
  </tr>
</table>
</body>
</html>
