Pertanyaan: 
<?php foreach ($data_faqs as $faq): ?>
    <p><b><?= $faq['ques']; ?></b></p>
    <p><?= $faq['ans']; ?></p>
<?php endforeach; ?>
