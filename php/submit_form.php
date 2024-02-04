<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームのデータを取得
    $inquiryType = $_POST["inquiry_type"];
    $inquiryContent = $_POST["inquiry_content"];
    $entityType = $_POST["entity_type"];
    $companyName = $_POST["company_name"];
    $contactPerson = $_POST["contact_person"];
    $email = $_POST["email"];
    $postalCode = $_POST["postal_code"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    // 送信先のメールアドレス
    $toEmail = "mail@financial-a.com";

    // メールの本文
    $message = "
    お問い合わせ内容:
    お問い合わせ事項: $inquiryType
    お問い合わせ内容: $inquiryContent
    法人/個人: $entityType
    会社名: $companyName
    部署・お問い合せの方の役職/氏名: $contactPerson
    メールアドレス: $email
    〒: $postalCode
    住所: $address
    電話: $phone
    ";

    // メールの送信
    $subject = "お問い合わせがありました";
    $headers = "From: $email";

    // メール送信
    mail($toEmail, $subject, $message, $headers);

    // 成功メッセージを返す（Ajax リクエストに対する応答）
    echo "Form submitted successfully!";
} else {
    // 不正なリクエスト
    echo "Invalid request";
}
?>
