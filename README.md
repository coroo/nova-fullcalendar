# Nova FullCalendar - Laravel Nova Package

A Laravel Nova Dashboard with FullCalendar JS | See [:blue_book:Documentation Page](https://coroo.github.io/nova-fullcalendar/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coroowicaksono/nova-fullcalendar)](https://packagist.org/packages/coroowicaksono/nova-fullcalendar)
[![Total Downloads](https://img.shields.io/packagist/dt/coroowicaksono/nova-fullcalendar)](https://packagist.org/packages/coroowicaksono/nova-fullcalendar)
[![License](https://img.shields.io/github/languages/top/coroo/nova-fullcalendar)](https://packagist.org/packages/coroowicaksono/nova-fullcalendar)
[![State Status](https://img.shields.io/github/deployments/coroo/nova-fullcalendar/github-pages)](https://packagist.org/packages/coroowicaksono/nova-fullcalendar)
[![License](https://img.shields.io/packagist/l/coroowicaksono/nova-fullcalendar)](https://github.com/coroo/nova-fullcalendar/blob/master/LICENSE)

[![License](https://img.shields.io/github/stars/coroo/nova-fullcalendar?style=social)](https://github.com/coroo/nova-fullcalendar/stargazers)

> This Nova FullCalendar JS Integration requires Nova 2.0 or higher.

![FullCalendar JS Integration in Action](https://raw.githubusercontent.com/coroo/nova-fullcalendar/gh-pages/assets/img/nova-fullcalendar.gif)

## Installation & Documentation

### Simple Installation

```php
// app/Providers/NovaServiceProvider
protected function cards()
{
    $events = Event::select(DB::raw('id, nama_kegiatan as title, concat(tanggal_acara, " ", jam_acara) as date, concat(tanggal_acara, " ", jam_acara) as start, tanggal_acara as end'))
        ->get()
        ->toJson();
    
    return [
        (new FullCalendar())
            ->series($events)
    ];
}
```
:mortar_board: For better experiences, we moved documentation to : __https://coroo.github.io/nova-fullcalendar/__

## ChangeLog

Please see [CHANGELOG](https://github.com/coroo/nova-fullcalendar/blob/master/CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](https://github.com/coroo/nova-fullcalendar/blob/master/LICENSE) for more information.


