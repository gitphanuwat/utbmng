@extends('layouthomes.template')
@section('title','ค้นหาข้อมูล')
@section('subtitle','ข้อมูล')
@section('body')
<?php
	function highlightKeywords($text, $keyword) {
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);

		for($i=0;$i<$wordsCount;$i++) {
			$highlighted_text = "<span style='font-weight:bold;color:red;'>$wordsAry[$i]</span>";
			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
		}
		return $text;
	}
?>
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">ค้นหาข้อมูล</h3>
    </div>
    <div class="box-body">
        <h4>ข้อมูลทั้งหมดในระบบ</h4>
        <form action="{{ url('search') }}" method="POST" class="navbar-form pull-left" role="search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="search" value="{{ isset($search) ? $search : null }}" placeholder="search" class="form-control" size="60"/>
                    <div class="input-group-addon" role="button" id="search">
                        <i class="glyphicon glyphicon-search"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
		@if($search)
		<div class="box-body">
			<div class="displaysearch">ผลการค้นหา : <span style='font-weight:bold;color:red;font-size:20px;'>{{$search}}</span>
			</div>
		</div>
		@endif
</div>

@if($search)
<div class="box box-defult">
  <div class="box-header with-border">
    <h3 class="box-title">ค้นหาข้อมูลภายในระบบ</h3>
  </div>

<div class="box-body">
<div class="table-responsive">
  <table class="table table-condensed">
      <tbody>
        <h5>ค้นพบหน่วยงาน <span class="label label-default">{{ count($organizes) }}</span> รายการ</h5>
        @foreach($organizes as $obj)
            <tr>
                <td><a href="{{ $obj->title}}">
                <?php echo highlightKeywords($obj->title,$search).' '; ?> <?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td><?php echo highlightKeywords($obj->website,$search); ?></td>
								<td><?php echo highlightKeywords($obj->facebook,$search); ?></td>
								<td><?php echo highlightKeywords($obj->tel,$search); ?></td>
                <td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
    <table class="table table-condensed">
        <tbody>
          <h5>ค้นพบบุคลากร <span class="label label-default">{{ count($persons) }}</span> รายการ</h5>
          @foreach($persons as $obj)
              <tr>
                  <td><a href="eis/profile?id={{ $obj->id}}">
                  <?php echo highlightKeywords($obj->firstname,$search).' '; ?> <?php echo highlightKeywords($obj->lastname,$search); ?></a></td>
									<td><?php echo highlightKeywords($obj->position,$search); ?></td>
									<td><?php echo highlightKeywords($obj->address,$search); ?></td>
									<td><?php echo highlightKeywords($obj->tel,$search); ?></td>
									<td><?php echo highlightKeywords($obj->email,$search); ?></td>
                  <td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
              </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
<div class="box-body">
  <div class="table-responsive">
      <table class="table table-condensed">
          <tbody>
            <h5>ค้นพบชุมชน <span class="label label-default">{{ count($villages) }}</span> รายการ</h5>
            @foreach($villages as $obj)
                <tr>
                    <td><a href="eis/profile?id={{ $obj->id}}">
                    <?php echo highlightKeywords($obj->name,$search); ?></a></td>
										<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
										<td><?php echo highlightKeywords($obj->address,$search); ?></td>
										<td><?php echo highlightKeywords($obj->leader,$search); ?></td>
										<td><?php echo highlightKeywords($obj->contact,$search); ?></td>
										<td><?php echo highlightKeywords($obj->tel,$search); ?></td>
                    <td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
                </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบกลุ่มชุมชน <span class="label label-default">{{ count($groups) }}</span> รายการ</h5>
				@foreach($groups as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td><?php echo highlightKeywords($obj->leader,$search); ?></td>
								<td><?php echo highlightKeywords($obj->contact,$search); ?></td>
								<td><?php echo highlightKeywords($obj->tel,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบเรื่องเด่นในชุมชน <span class="label label-default">{{ count($activitys) }}</span> รายการ</h5>
				@foreach($activitys as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td><?php echo highlightKeywords($obj->leader,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบแหล่งท่องเที่ยว <span class="label label-default">{{ count($tourists) }}</span> รายการ</h5>
				@foreach($tourists as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td><?php echo highlightKeywords($obj->website,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบกิจกรรม <span class="label label-default">{{ count($events) }}</span> รายการ</h5>
				@foreach($events as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->title,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td><?php echo highlightKeywords($obj->contact,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบปัญหาชุมชน <span class="label label-default">{{ count($problems) }}</span> รายการ</h5>
				@foreach($problems as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->address,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบข่าวสาร <span class="label label-default">{{ count($infos) }}</span> รายการ</h5>
				@foreach($infos as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->title,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบแบบสำรวจข้อมูล <span class="label label-default">{{ count($polltopics) }}</span> รายการ</h5>
				@foreach($polltopics as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->title,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบข้อร้องเรียน <span class="label label-default">{{ count($complaints) }}</span> รายการ</h5>
				@foreach($complaints as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->name,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td><?php echo highlightKeywords($obj->sender,$search); ?></td>
								<td><?php echo highlightKeywords($obj->contact,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
	<table class="table table-condensed">
			<tbody>
				<h5>ค้นพบเอกสาร <span class="label label-default">{{ count($downloads) }}</span> รายการ</h5>
				@foreach($downloads as $obj)
						<tr>
								<td><a href="eis/profile?id={{ $obj->id}}">
								<?php echo highlightKeywords($obj->title,$search); ?></a></td>
								<td><?php echo highlightKeywords($obj->detail,$search); ?></td>
								<td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
						</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>


</div>
@endif

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/search.js') }}"></script>
@endsection
