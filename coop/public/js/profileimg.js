
<script type="text/javascript">
// เป็นส่วนการทำงานของ Ajax
    $(document).ready(function(){

        $("#myform").on("submit",function(e){ // จะทำงานก็ต่อเมื่อกด submit ฟอร์ม
    e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
            var fd = new FormData(); // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object

            var files = $('#file')[0].files; //เป็นการดึงข้อมูลรูปภาพเพื่อเตรียมเช็คไฟล์ก่อนทำงานส่วน Ajax
        
            // เช็คว่ามีไฟล์รูปภาพอยู่หรือไม่
            if(files.length > 0 ){

                fd.append('file',files[0]); //ใช้ในการแทรกค่าไฟล์รูปภาพใน element 

                $.ajax({
                    url:'uploads.php', //ให้ระบุชื่อไฟล์ PHP ที่เราจะส่งค่าไป
                    type:'post',
                    data:fd, //ข้อมูลจาก input ที่ส่งเข้าไปที่ PHP
                    contentType: false,
                    processData: false,
                    success:function(response){ //หากทำงานสำเร็จ จะรับค่ามาจาก JSON หลังจากนั้นก็ให้ทำงานตามที่เรากำหนดได้
            
                        if(response != 0){
                            $("#img").attr("src",response);
                            $('.preview img').show();
                        }else{
                            alert('File not uploaded');
                        }
                    }
                });
            }else{
                alert("Please select a file.");
            }
        });
    });


</script>