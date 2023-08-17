<?php

namespace App\Providers;

use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        // Menu::new()
        //     ->appMenu()
        //     ->submenu('About', Menu::new()
        //         ->link('https://beyondco.de', 'Beyond Code')
        //         ->link('https://simonhamp.me', 'Simon Hamp')
        //     )
        //     ->submenu('View', Menu::new()
        //         ->toggleFullscreen()
        //         ->separator()
        //         ->link('https://laravel.com', 'Learn More', 'CmdOrCtrl+L')
        //     )
        //     ->register();

        Window::open()
            ->title('My first app')
            ->rememberState(true)
            ->route('test')->showDevTools(false);

        // Window::open('second')
        //     ->rememberState(true)
        //     ->route('home')->showDevTools(false);
            // ->width(800)
            // ->height(800);

        Menu::new()
            ->appMenu()
            ->editMenu()
            ->submenu('My menu', Menu::new()
                ->label('Add reminder')
                ->link('https://google.com', 'GOOGLE ME', 'cmd+d')
                ->toggleFullscreen()
                // ->checkbox('hahaha', false)
                ->separator()
                ->quit()
            )
            ->register();
        /**
            Dock::menu(
                Menu::new()
                    ->event(DockItemClicked::class, 'Settings')
                    ->submenu('Help',
                        Menu::new()
                            ->event(DockItemClicked::class, 'About')
                            ->event(DockItemClicked::class, 'Learn More…')
                    )
            );

            ContextMenu::register(
                Menu::new()
                    ->event(ContextMenuClicked::class, 'Do something')
            );

            GlobalShortcut::new()
                ->key('CmdOrCtrl+Shift+I')
                ->event(ShortcutPressed::class)
                ->register();
        */
    }
}
