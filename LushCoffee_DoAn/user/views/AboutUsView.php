<?php
session_start();  // Start session at the very top
include('layouts/header.php');
?>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .about-us {
            padding: 1px;
            background-color: #fff;
            color: #333;
            margin-top: 80px;
            border-radius: 10px;
            max-width: 1000px;
            width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .auth-header {
            text-align: center;
            margin-top: 10px;
            padding-top: 10px;
        }

        .auth-header h2 {
            font-size: 32px;
            margin: 0;
            color: #2d1e17;
            font-weight: bold;
        }

        .auth-header p {
            font-size: 12px;
            color: #2c3e50;
            margin-top: 5px;
            font-style: italic;
        }

        .content-section {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .content-section:nth-child(even) {
            flex-direction: row-reverse;
        }

        .content-text, .content-image {
            flex: 1;
            padding: 25px;
        }

        .content-text {
            width: 50%;
            text-align: left;
        }

        .content-image {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-text h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: bold;
        }

        .content-text p {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #555;
        }

        .team {
            margin-top: 30px;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .team-member {
            text-align: center;
            width: 45%;
            max-width: 200px;
            margin-top: 30px;
        }

        .team-member img {
            border-radius: 10px;
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .team-member h4 {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }

        .team-member p {
            font-size: 16px;
            color: #777;
        }
    </style>

    <!-- About Us Section -->
    <div class="about-us">
        <div class="auth-header">
            <h2>CÂU CHUYỆN THƯƠNG HIỆU</h2>
            <p>01/10/2024</p>
            <hr class="mx-auto" style="width: 50px; height: 3px; background-color: #007bff;">
        </div>
        <div class="content-section">
            <div class="content-text">
                <h3>Câu Chuyện Của Chúng Tôi</h3>
                <p>Ra đời năm 2024, The Lush Coffee & Dessert mang trong mình niềm đam mê bất tận về nghệ thuật chế biến cà phê, trà và bánh. Nơi hương vị cà phê hòa quyện cùng sự ngọt ngào của những món tráng miệng tinh tế, mang đến trải nghiệm ấm áp và đáng nhớ.</p>
                <p>Tại The Lush Coffee & Dessert, mỗi ly cà phê và món bánh đều được tạo ra từ niềm đam mê, gợi lên cảm giác thư thái và niềm vui trọn vẹn trong từng khoảnh khắc.</p>
            </div>
            <div class="content-image">
                <img src="./assets/images/our-story.jpg" alt="Câu chuyện của chúng tôi">
            </div>
        </div>

        <div class="content-section">
            <div class="content-text">
                <h3>Sứ Mệnh Và Giá Trị</h3>
                <p>Sứ mệnh của chúng tôi là mang đến hương vị và trải nghiệm văn hóa uống cà phê, trà thực thụ, giúp khách hàng kết nối với chính mình và mọi người xung quanh.</p>
                <p>Chúng tôi chọn lọc nguyên liệu từ những nông trại uy tín, đảm bảo hương vị độc đáo và sáng tạo, đồng thời giữ được nét truyền thống phù hợp với mọi khẩu vị.</p>
            </div>
            <div class="content-image">
                <img src="./assets/images/mission.jpg" alt="Sứ mệnh và giá trị">
            </div>
        </div>

        <div class="content-section">
            <div class="content-text">
                <h3>Tầm Nhìn</h3>
                <p>The Lush Coffee & Dessert mong muốn trở thành một điểm đến quen thuộc và đáng tin cậy trong hành trình tìm kiếm những khoảnh khắc ý nghĩa của bạn. Chúng tôi không chỉ đơn thuần là một quán cà phê, trà và bánh, mà còn là nơi giúp thắp sáng và lan tỏa tình yêu, niềm vui, và sự ấm áp đến mọi người.</p>
                <p>Hãy đến với chúng tôi và cùng nhau tạo nên những khoảnh khắc đáng nhớ, nơi mà mỗi tách cà phê, mỗi ly trà, mỗi miếng bánh đều là ánh sáng dẫn lối, mang đến sự an lành và hạnh phúc.</p>
            </div>
            <div class="content-image">
                <img src="./assets/images/vission.jpg" alt="Tầm nhìn">
            </div>
        </div>

        <div class="team">
            <div class="auth-header">
                <h2>ĐỘI NGŨ CỦA CHÚNG TÔI</h2>
                <hr class="mx-auto" style="width: 50px; height: 3px; background-color: #007bff;">
            </div>
            <div class="team-members">
                <div class="team-member">
                    <img src="./assets/images/mem1.jpg" alt="Thành viên 1">
                    <h4>Phạm Trần Dạ Thảo</h4>
                    <p>Quản lý</p>
                </div>
                <div class="team-member">
                    <img src="./assets/images/mem2.jpg" alt="Thành viên 2">
                    <h4>Nguyễn Phan Thảo Nguyên</h4>
                    <p>Nhân viên</p>
                </div>
                <div class="team-member">
                    <img src="./assets/images/mem3.jpg" alt="Thành viên 3">
                    <h4>Nguyễn Thị Hồng Ngọc</h4>
                    <p>Nhân viên</p>
                </div>
                <div class="team-member">
                    <img src="./assets/images/mem4.jpg" alt="Thành viên 4">
                    <h4>Nguyễn Lâm Khôi Nguyên</h4>
                    <p>Nhân viên</p>
                </div>
            </div>
        </div>
    </div>

<?php include('layouts/footer.php'); ?>