<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                var height = $('input[name="height"]').val();
                var weight = $('input[name="weight"]').val();
                if (height == "" || weight == "") {
                    alert("身高和體重不能為空");
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-lg w-1/2 h-1/2">
        <h1 class='text-xl font-bold mb-6'>BMI計算器</h1>
        <form action="bmi_result.php" method="post" class="space-y-4">
            <input type="number" name="height" placeholder="身高(單位公分)" min="120" max="220" step="0.1" class="w-full p-2 border rounded" />
            <input type="number" name="weight" placeholder="體重(單位公斤)" min="30" max="160" step="0.1" class="w-full p-2 border rounded" /> <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-400">計算</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $weight = $_POST['weight'];
            $height = $_POST['height'] / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);
            $height *= 100;
            echo "<div class='mt-4'>";
            echo "身高: $height 公分<br>體重: $weight 公斤<br>";
            echo "BMI為: $bmi<br>";

            if ($bmi < 18.5) {
                echo "體重過輕";
            } elseif ($bmi < 24) {
                echo "BMI正常";
            } elseif ($bmi < 27) {
                echo "體重過重";
            } else {
                echo "肥胖";
            }
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>