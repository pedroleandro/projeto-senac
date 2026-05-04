<?php

/**
 * Partial: Flash Messages
 *
 * Renderiza as mensagens flash da sessão com classes do Tailwind CSS.
 *
 * Inclua este partial em qualquer view onde mensagens possam aparecer:
 *   <?php include __DIR__ . '/../partials/flash.php'; ?>
 *
 * Ou, se estiver usando Plates com layout, chame no layout principal.
 */

use App\Core\Message;

$messages = Message::get();

if (!$messages) {
    return;
}

// Mapeamento: tipo semântico → classes Tailwind
$styles = [
    'success' => [
        'wrapper' => 'bg-green-50 border border-green-400 text-green-800',
        'label'   => 'text-green-900 font-bold',
        'icon'    => '✓',
    ],
    'error' => [
        'wrapper' => 'bg-red-50 border border-red-400 text-red-800',
        'label'   => 'text-red-900 font-bold',
        'icon'    => '✕',
    ],
    'warning' => [
        'wrapper' => 'bg-yellow-50 border border-yellow-400 text-yellow-800',
        'label'   => 'text-yellow-900 font-bold',
        'icon'    => '⚠',
    ],
    'info' => [
        'wrapper' => 'bg-blue-50 border border-blue-400 text-blue-800',
        'label'   => 'text-blue-900 font-bold',
        'icon'    => 'ℹ',
    ],
];

?>

<div class="space-y-2 my-4" role="alert" aria-live="polite">
    <?php foreach ($messages as $msg): ?>
        <?php $style = $styles[$msg['type']] ?? $styles['info']; ?>

        <div class="flex items-start gap-3 px-4 py-3 rounded-lg <?= $style['wrapper'] ?>">

            <span class="text-lg leading-none mt-0.5" aria-hidden="true">
                <?= $style['icon'] ?>
            </span>

            <p class="text-sm">
                <?php if ($msg['label']): ?>
                    <span class="<?= $style['label'] ?>">
                        <?= htmlspecialchars($msg['label'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
                <?php endif; ?>
                <?= htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8') ?>
            </p>

        </div>

    <?php endforeach; ?>
</div>