<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNy8Ckzd\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNy8Ckzd/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNy8Ckzd.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNy8Ckzd\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerNy8Ckzd\App_KernelDevDebugContainer([
    'container.build_hash' => 'Ny8Ckzd',
    'container.build_id' => '693b5256',
    'container.build_time' => 1750343391,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNy8Ckzd');
