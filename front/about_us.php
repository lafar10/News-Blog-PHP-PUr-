<?php

include('../config/dbcon.php');
include('../front/layouts/header.php');
?>

<style>
    #pdef {
        margin-top: 35px;
        animation-name: pdef;
        animation-duration: 2s;
        right: 0%;
    }

    #titdef {
        animation-name: titdef;
        animation-duration: 0.5s;

        animation-direction: top;
    }

    #imgdef {
        animation-name: imgdef;
        animation-duration: 1s;
    }

    @keyframes pdef {
        from {
            transform: translateX(50px);
        }

        to {
            transform: translateX(0px);
        }
    }

    @keyframes imgdef {
        from {
            transform: translateY(50px);
        }

        to {
            transform: translateX(0px);
        }
    }

    @keyframes titdef {
        from {
            transform: translateX(50px);
        }

        to {
            transform: translateX(0px);
        }
    }
</style>

<div align="center">
    <br>
    <br>
    <br>
    <br>
    <div class="row col-lg-8" align="center">
        <div class="col-lg-12">
            <img src="../public/master_icon.png" id="imgdef" style="width:100%;height:250px;" alt="" srcset="">
        </div>
        <br>
        <br>
        <div align="center">
            <h2 class="display-5" id="titdef">من نحن</h2>
            <hr style="width:130px;">
        </div>
        <br>
        <br>
        <br>
        <div class="col-lg-12">

            <p id="pdef" align="right">
                الحزب الاشتراكي الموحد حزب يساري مستقل في اختياراته وتدبيره عن أجهزة الدولة، وكل مراكز النفوذ الاقتصادي داخل المغرب وخارجه، يتبنى الاختيار الاشتراكي بكل اجتهاداته وأبعاده التحررية والديمقراطية والإنسانية.

                ويعتمد التعبئة والنضال الجماهيريين للدفاع عن مشروعه المجتمعي الديمقراطي وبرنامجه السياسي، وينحاز لمصالح الوطن العليا ولحقوق الكادحات والكادحين وكافة المتضررين من أوضاع الظلم المستمرة، ويدافع عن قيم الحداثة والمواطنة والتقدم العلمي والعقلانية.

                . ويتمثل الهوية الوطنية على قاعدة الأسس المكونة لها والتي تعيش تفاعلا وتكاملا بين أبعادها المتنوعة والغنية الإسلامية والعربية والأمازيغية، كهوية منفتحة على قيم العصر التقدمية، ومبنية على التسامح والتعايش والحرية
            </p>
        </div>
    </div>
    <br />
    <br />


</div>



<?php

include('../front/layouts/footer.php');

include('../front/layouts/scripts.php');

?>