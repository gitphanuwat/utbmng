@extends('layouts.template')
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
        <h4>นักวิจัย, งานวิจัย, ผู้เชี่ยวชาญ, ผลงานสร้างสรรค์, ปัญหาชุมชน</h4>
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
				หรือ <a href="{{url('question')}}" class="btn btn-primary btn-xs btnsearch">ส่งข้อมูลให้นักวิจัย</a>
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
              ค้นพบนักวิจัย <span class="label label-default">{{ count($researchers) }}</span> รายการ
              @foreach($researchers as $obj)
                  <tr>
                      <td><a href="eis/profile?id={{ $obj->id}}">
                        {{ $obj->headname }}<?php echo highlightKeywords($obj->firstname,$search).' '; ?> <?php echo highlightKeywords($obj->lastname,$search); ?></a></td>
                      <td>{{$obj->university->name}}</td>
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
                ค้นพบงานวิจัย <span class="label label-default">{{ count($researchs) }}</span> รายการ
                @foreach($researchs as $obj)
                    <tr>
                        <td><a href="eis/profileresearch?id={{ $obj->id}}">
                          <?php echo highlightKeywords($obj->title_th,$search); ?></a></td>
                        <td><?php echo highlightKeywords($obj->title_eng,$search); ?></td>
                        <td><?php echo highlightKeywords($obj->propose,$search); ?></td>
                        <td><?php echo highlightKeywords($obj->keyword,$search); ?></td>
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
            ค้นพบผู้เชี่ยวชาญ <span class="label label-default">{{ count($experts) }}</span> รายการ
            @foreach($experts as $obj)
                <tr>
                    <td><a href="eis/profileexp?id={{ $obj->id}}">
                      {{ $obj->headname }}<?php echo highlightKeywords($obj->firstname,$search).' '; ?> <?php echo highlightKeywords($obj->lastname,$search); ?></a></td>
                    <td>{{$obj->area->name}},{{$obj->area->center->name}},{{$obj->area->center->university->name}}</td>
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
              ค้นพบความเชี่ยวชาญ <span class="label label-default">{{ count($expertlists) }}</span> รายการ
              @foreach($expertlists as $obj)
              <?php
                if($obj->expert_id!=0){
                  $id=$obj->expert_id;
                  $link='profileexp';
                }else{
                  $id=$obj->researcher_id;
                  $link='profile';
                }
              ?>
                  <tr>
                      <td><a href="eis/{{$link}}?id={{$id}}">
                        <?php echo highlightKeywords($obj->title_th,$search); ?></a></td>
                      <td><?php echo highlightKeywords($obj->title_eng,$search); ?></td>
                      <td><?php echo highlightKeywords($obj->detail,$search); ?></td>
                      <td>{{$id}}</td>
                      <td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
                      <td></td>
                      <td></td>
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
                ค้นพบผลงานสร้างสรรค์ <span class="label label-default">{{ count($creatives) }}</span> รายการ
                @foreach($creatives as $obj)
                    <tr>
                        <td><a href="eis/profilecreative?id={{ $obj->id}}">
                          <?php echo highlightKeywords($obj->title,$search); ?></a></td>
                          <td><?php echo highlightKeywords($obj->keyword,$search); ?></td>
                        <td><?php echo highlightKeywords($obj->abstract,$search); ?></td>
                        <td></td>
                        <td>{{ date('d.m.Y - H:i:s', strtotime($obj->created_at)) }}</td>
                        <td></td>
                        <td></td>
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
                  ค้นพบพื้นที่ชุมชน <span class="label label-default">{{ count($problems) }}</span> รายการ
                  @foreach($problems as $obj)
                      <tr>
                          <td><a href="eis/profilearea?id={{ $obj->area_id}}">
                            <?php echo highlightKeywords($obj->name,$search); ?></a></td>
                          <td><a href="eis/profilepro?id={{ $obj->id}}">
                            <?php echo highlightKeywords($obj->title,$search); ?></a></td>
                          <td><?php echo highlightKeywords($obj->detail,$search); ?></td>
                          <td><?php echo highlightKeywords($obj->instruct,$search); ?></td>
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
                  ค้นพบผลการใช้ระบบ <span class="label label-default">{{ count($usefuls) }}</span> รายการ
                  @foreach($usefuls as $obj)
                      <tr>
                          <td><a href="eis/profileuseful?id={{ $obj->id}}">
                            <?php echo highlightKeywords($obj->title,$search); ?></a></td>
                          <td><?php echo highlightKeywords($obj->detial,$search); ?></td>
                          <td><?php echo highlightKeywords($obj->keyman,$search); ?></td>
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
