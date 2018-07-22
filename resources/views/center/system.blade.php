@extends('layouts.template')
@section('title','เกี่ยวกับระบบ')
@section('subtitle','รายละเอียดระบบ')
@section('styles')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
<link rel="stylesheet" href="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css") }}">


@endsection
@section('body')

<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ศูนย์ข้อมูลการวิจัยเพื่อท้องถิ่น (Lrd:Local research development)</h3>
      </div>
      <div class="box-footer box-comments">
        <div class="box-comment">
          <div class="comment-text">
                <p>&emsp;&emsp;&emsp;ระบบฐานข้อมูลการวิจัยและพัฒนาชุมชนท้องถิ่นน่าอยู่สำหรับเครือข่ายมหาวิทยาลัยราชภัฏ
                  เป็นส่วนหนึ่งของโครงการการวิจัยและพัฒนาชุมชนท้องถิ่นน่าอยู่โดยเครือข่ายมหาวิทยาลัยราชภัฏ
                  ซึ่งได้รับการสนับสนุนโดยสำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ (สสส.)
                  โดยมีเครือข่ายมหาวิทยาลัยราชภัฏและภาคีร่วมพัฒนา คือ องค์กรปกครองส่วนท้องถิ่น องค์กรชุมชน และภาคราชการ
                  มีเป้าหมายให้เกิด<b>การเรียนรู้ร่วมกันระหว่างเครือข่ายมหาวิทยาลัยราชภัฏกับชุมชนท้องถิ่น</b>
                  เพื่อการนำใช้ข้อมูลให้เกิดประโยชน์สู่การจัดการตนเองได้อย่างมีประสิทธิภาพและประสิทธิผล
                  ให้บรรลุวัตถุประสงค์ในการพัฒนาระบบและกลไกการสนับสนุนการวิจัยเชิงพื้นที่ให้เกิดรูปธรรมการทำงานร่วมกันของนักวิชาการในเครือข่ายมหาวิทยาลัยราชภัฏ
                  เครือข่ายองค์กรปกครองส่วนท้องถิ่นและภาคีในการเสริมสร้างความเข้มแข็งของชุมชน
                  และนำใช้ข้อมูลสู่การสร้างองค์ความรู้และนวัตกรรมที่เหมาะสมสำหรับการพัฒนาพื้นที่ต้นแบบสุขภาวะ
                  โดยพัฒนาชุดความรู้ คู่มือ องค์ความรู้และนวัตกรรม เครื่องมือทางวิชาการที่ชุมชนท้องถิ่นสามารถนำใช้ในการต่อยอดขยายผลสู่การจัดการตนเองอย่างยั่งยืน</p>
              		<p>&emsp;&emsp;&emsp;การสร้างองค์ความรู้และนวัตกรรมที่เหมาะสมกับการพัฒนาเชิงพื้นที่ (Research Project)
                    โดยใช้หลักการสนับสนุนทุนวิจัยจากโจทย์ในพื้นที่สร้างกระบวนการเรียนรู้งานวิจัยเชิงพื้นที่ระหว่างนักวิจัยของมหาวิทยาลัยและนักวิจัยในพื้นที่
                    ให้เกิดการสร้างองค์ความรู้และนวัตกรรมที่เหมาะสมกับการพัฒนาเชิงพื้นที่ และพัฒนาฐานข้อมูลด้านการวิจัย
                    (ข้อมูลจากมหาวิทยาลัยราชภัฏเครือข่าย) สำหรับการจัดการตนเองและยกระดับต่อเนื่อง (Data base Development)
                    จนสามารถพัฒนาชุดความรู้ คู่มือ เครื่องมือเพื่อสร้างองค์ความรู้ และนวัตกรรมที่เหมาะสมกับพื้นที่ได้</p>
                    <p>&emsp;&emsp;&emsp;การพัฒนาระบบศูนย์กลางสำหรับการจัดการข้อมูลทั้งระบบจึงมีบทบาทและความจำเป็น
                      สำหรับการสนับสนุนกระบวนการนี้ให้สำเร็จลุล่วงและเกิดการนำไปใช้ประโยชน์ได้อย่างเป็นรูปธรรม
                      ระบบฐานข้อมูลการวิจัยและพัฒนาชุมชนท้องถิ่นน่าอยู่สำหรับเครือข่ายมหาวิทยาลัยราชภัฏ
                      จึงพัฒนาสำหรับการจัดการข้อมูลที่สอดคล้องกับโครงการ ได้แก่ การบริหารข้อมูลพื้นที่ชุมชน
                      การรวบรวมข้อมูลงานวิจัย ผลงานสร้างสรรค์ นักวิจัย และผู้เชี่ยวชาญ
                      ประกอบไปด้วยฐานข้อมูลที่สามารถเชื่อมโยงประมวลผลข้อมูลร่วมกัน นำเข้าข้อมูลด้วยรูปแบบเดียวกัน
                      ทำให้เกิดฐานข้อมูลอย่างเป็นระบบมีมาตรฐานและสามารถจัดเก็บประวัติในการดำเนินกิจกรรมของโครงการ
                      ที่สามารถเรียกแสดงข้อมูลย้อนหลัง และเพื่อการขยายผลต่อไปในอนาคตได้</p>
                      <p><i class='fa fa-paperclip'></i><a href="{{url('/usermanual.pdf')}}">คู่มือการใช้ระบบ</a></p>
          </div>
          <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->

      </div>
    </div>


  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="box box-widget">
        <!-- /.box-header -->
        <div class="box-body">
          <a href="{{url('images/system/1.png')}}" data-toggle="lightbox" data-gallery="example-gallery">
          <img class="img-responsive pad" src="{{url('images/system/1.png')}}">
        </a>
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
          <div class="box-comment">
            <!-- User image -->

            <div class="comment-text">
                  <span class="username">
                    เป้าหมายของระบบ
                  </span><!-- /.username -->
                  &emsp;&emsp;การส่งเสริมการเรียนรู้ร่วมกันระหว่างเครือข่ายมหาวิทยาลัยราชภัฏกับชุมชนท้องถิ่น โดยสร้างศูนย์ข้อมูลภาควิชาการรวบรวม
                  ข้อมูลงานวิจัย ผลงานสร้างสรรค์ นักวิจัย และผู้เชี่ยวชาญ ที่สามารถเชื่อมโยงไปยังปัญหาท้องถิ่นได้ตรงกับสภาพปัญหาในพื้นที่<br>
                  &emsp;&emsp;สร้างเครืองมือสำหรับการดำเนินงานของภาควิชาการกับภาคท้องถิ่นชุมชนโดยเน้นการขับเคลื่อนระบบด้วยผู้ใช้ระบบเอง
                  เพื่อการนำใช้ข้อมูลให้เกิดประโยชน์สู่การจัดการตนเองได้อย่างมีประสิทธิภาพและการขยายผลต่อไปในอนาคต
            </div>
            <!-- /.comment-text -->
          </div>
        </div>
        <!-- /.box-footer -->
      </div>
      <div class="box box-widget">
          <div class="box-body">
            <a href="{{url('images/system/3.png')}}" data-toggle="lightbox" data-gallery="example-gallery">
            <img class="img-responsive pad" src="{{url('images/system/3.png')}}">
          </a>
          </div>
          <!-- /.box-body -->
          <div class="box-footer box-comments">
            <div class="box-comment">

              <div class="comment-text">
                    <span class="username">
                      การออกแบบโครงสร้างข้อมูล
                    </span><!-- /.username -->
                &emsp;&emsp;การออกแบบการจัดเก็บข้อมูลตามระดับชั้นข้อมูล ศูนย์ข้อมูล->มหาวิทยาลัย->ศูนย์จัดการเครือข่าย->พื้นที่ชุมชน
                และกำหนดสิทธิ์การเข้าถึงข้อมูลตามโครงสร้างเพื่อความเป็นอิสระในการจัดการข้อมูลของผู้ใช้แต่ละกลุ่ม ข้อมูลทั้งหมดจะถูกรวบรวม
                แสดงรายงานสารสนเทศแบบสาธารณะเพื่่อประโยชน์สำหรับผู้ใช้ทั่วไป<br>
              </div>
              <!-- /.comment-text -->
            </div>
          </div>
          <!-- /.box-footer -->
        </div>
  </div>
  <div class="col-md-6">
    <div class="box box-widget">
        <div class="box-body">
          <a href="{{url('images/system/2.png')}}" data-toggle="lightbox" data-gallery="example-gallery">
          <img class="img-responsive pad" src="{{url('images/system/2.png')}}">
        </a>
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
          <div class="box-comment">
            <div class="comment-text">
                  <span class="username">
                    สถาปัตยกรรมระบบ
                  </span><!-- /.username -->
              การออกแบบฐานข้อมูลด้วยข้อมูล 2 กลุ่มหลัก คือ<br>
              1) ข้อมูลจากภาควิชาการ คือข้อมูลความรู้และความเชี่ยวชาญที่จะสามารถนำไปแก้ปัญหาในท้องถิ่น
              ได้แก่ ข้อมูลมหาวิทยาลัย นักวิจัย ความเชี่ยวชาญ และผลงานสร้างสรรค์<br>
              2) ข้อมูลจากภาคท้องถิ่น คือ ข้อมูลพื้นที่ชุมชน องค์ความรู้จากผู้เชี่ยวชาญ และปัญหาในท้องถิ่น<br>
              &emsp;&emsp;&emsp;การรวบรวมข้อมูลทั้งหมดจะถูกเชื่อมโยงด้วยกลุ่มข้อมูล เพื่อนำเสนอข้อมูลที่
              สัมพันธ์กันสร้างระบบสารสนเทศเพื่อสนับสนุนการดำเนินงานในแต่ละด้าน (MIS,EIS,DSS)
            </div>
            <!-- /.comment-text -->
          </div>
        </div>
        <!-- /.box-footer -->
      </div>
      <div class="box box-widget">
          <div class="box-body">
            <a href="{{url('images/system/4.png')}}" data-toggle="lightbox" data-gallery="example-gallery">
            <img class="img-responsive pad" src="{{url('images/system/4.png')}}">
          </a>
          </div>
          <!-- /.box-body -->
          <div class="box-footer box-comments">
            <div class="box-comment">
              <div class="comment-text">
                    <span class="username">
                      การออกแบบระบบสารสนเทศ
                    </span><!-- /.username -->
                &emsp;&emsp;การออกแบบฟังก์ชันที่สัมพันธ์กับบริบทของผู้ใช้ 5 กลุ่มคือ ผู้ดูแลระบบ มหาวิทยาลัย ศูนย์จัดการเครือข่าย หน่วยพื้นที่ และผู้ใช้ทั่วไป <br>
                &emsp;&emsp;สมาชิกระบบนำเข้าข้อมูลและระบบสามารถประมวลผลเพื่อให้เกิดประโยชน์ในการใช้งานของผู้ใช้ได้ 4 ด้านคือ
                การพัฒนาโจทย์วิจัยคุณภาพ ข้อมูลสนับสนุนการตัดสินใจ ระบบสนับสนุนการใช้ประโยชน์ และสร้างระบบสารสนเทศนำเสนอข้อมูลสรุปของระบบ
              </div>
              <!-- /.comment-text -->
            </div>
          </div>
          <!-- /.box-footer -->
        </div>
  </div>
</div>
 @endsection

  @section('script')
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                  event.preventDefault();
                  $(this).ekkoLightbox();
              });
</script>
  @endsection
