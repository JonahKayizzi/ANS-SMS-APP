<?php

namespace Tests\Carbon;

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Carbon\Carbon;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Tests\AbstractTestCase;

class LocalizationTest extends AbstractTestCase
{
    public function testGetTranslator()
    {
        $t = Carbon::getTranslator();
        $this->assertNotNull($t);
        $this->assertSame('en', $t->getLocale());
    }

    public function testSetTranslator()
    {
        $t = new Translator('fr');
        $t->addLoader('array', new ArrayLoader());
        Carbon::setTranslator($t);

        $t = Carbon::getTranslator();
        $this->assertNotNull($t);
        $this->assertSame('fr', $t->getLocale());
    }

    public function testGetLocale()
    {
        Carbon::setLocale('en');
        $this->assertSame('en', Carbon::getLocale());
    }

    public function testSetLocale()
    {
        Carbon::setLocale('en');
        $this->assertSame('en', Carbon::getLocale());
        Carbon::setLocale('fr');
        $this->assertSame('fr', Carbon::getLocale());
    }

    /**
     * The purpose of these tests aren't to test the validitity of the translation
     * but more so to test that the language file exists.
     */
    public function testDiffForHumansLocalizedInFrench()
    {
        Carbon::setLocale('fr');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {

            $d = Carbon::now()->subSecond();
            $scope->assertSame('il y a 1 seconde', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('il y a 2 secondes', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('il y a 1 minute', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('il y a 2 minutes', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('il y a 1 heure', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('il y a 2 heures', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('il y a 1 jour', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('il y a 2 jours', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('il y a 1 semaine', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('il y a 2 semaines', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('il y a 1 mois', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('il y a 2 mois', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('il y a 1 an', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('il y a 2 ans', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('dans 1 seconde', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 seconde apr??s', $d->diffForHumans($d2));
            $scope->assertSame('1 seconde avant', $d2->diffForHumans($d));

            $scope->assertSame('1 seconde', $d->diffForHumans($d2, true));
            $scope->assertSame('2 secondes', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInSpanish()
    {
        Carbon::setLocale('es');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('hace 1 segundo', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(3);
            $scope->assertSame('hace 3 segundos', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('hace 1 minuto', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('hace 2 minutos', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('hace 1 hora', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('hace 2 horas', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('hace 1 d??a', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('hace 2 d??as', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('hace 1 semana', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('hace 2 semanas', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('hace 1 mes', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('hace 2 meses', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('hace 1 a??o', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('hace 2 a??os', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('dentro de 1 segundo', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 segundo despu??s', $d->diffForHumans($d2));
            $scope->assertSame('1 segundo antes', $d2->diffForHumans($d));

            $scope->assertSame('1 segundo', $d->diffForHumans($d2, true));
            $scope->assertSame('2 segundos', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInItalian()
    {
        Carbon::setLocale('it');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->addYear();
            $scope->assertSame('1 anno da adesso', $d->diffForHumans());

            $d = Carbon::now()->addYears(2);
            $scope->assertSame('2 anni da adesso', $d->diffForHumans());
        });
    }

    public function testDiffForHumansLocalizedInGerman()
    {
        Carbon::setLocale('de');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->addYear();
            $scope->assertSame('in 1 Jahr', $d->diffForHumans());

            $d = Carbon::now()->addYears(2);
            $scope->assertSame('in 2 Jahren', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 Jahr sp??ter', Carbon::now()->diffForHumans($d));

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 Jahre sp??ter', Carbon::now()->diffForHumans($d));

            $d = Carbon::now()->addYear();
            $scope->assertSame('1 Jahr zuvor', Carbon::now()->diffForHumans($d));

            $d = Carbon::now()->addYears(2);
            $scope->assertSame('2 Jahre zuvor', Carbon::now()->diffForHumans($d));

            $d = Carbon::now()->subYear();
            $scope->assertSame('vor 1 Jahr', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('vor 2 Jahren', $d->diffForHumans());
        });
    }

    public function testDiffForHumansLocalizedInTurkish()
    {
        Carbon::setLocale('tr');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 saniye ??nce', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 saniye ??nce', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 dakika ??nce', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 dakika ??nce', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('1 saat ??nce', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 saat ??nce', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('1 g??n ??nce', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 g??n ??nce', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 hafta ??nce', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 hafta ??nce', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 ay ??nce', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 ay ??nce', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 y??l ??nce', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 y??l ??nce', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('1 saniye andan itibaren', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 saniye sonra', $d->diffForHumans($d2));
            $scope->assertSame('1 saniye ??nce', $d2->diffForHumans($d));

            $scope->assertSame('1 saniye', $d->diffForHumans($d2, true));
            $scope->assertSame('2 saniye', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInDanish()
    {
        Carbon::setLocale('da');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 sekund siden', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 sekunder siden', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 minut siden', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 minutter siden', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('1 time siden', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 timer siden', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('1 dag siden', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 dage siden', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 uge siden', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 uger siden', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 m??ned siden', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 m??neder siden', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 ??r siden', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 ??r siden', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('om 1 sekund', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 sekund efter', $d->diffForHumans($d2));
            $scope->assertSame('1 sekund f??r', $d2->diffForHumans($d));

            $scope->assertSame('1 sekund', $d->diffForHumans($d2, true));
            $scope->assertSame('2 sekunder', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInLithuanian()
    {
        Carbon::setLocale('lt');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->addYear();
            $scope->assertSame('u?? 1 metus', $d->diffForHumans());

            $d = Carbon::now()->addYears(2);
            $scope->assertSame('u?? 2 metus', $d->diffForHumans());
        });
    }

    public function testDiffForHumansLocalizedInKorean()
    {
        Carbon::setLocale('ko');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->addYear();
            $scope->assertSame('1 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->addYears(2);
            $scope->assertSame('2 ??? ???', $d->diffForHumans());
        });
    }

    public function testDiffForHumansLocalizedInFarsi()
    {
        Carbon::setLocale('fa');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 ?????????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 ?????????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 ?????????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 ?????????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('1 ???????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 ???????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('1 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 ???????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 ???????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 ?????? ??????', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('1 ?????????? ??????', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 ?????????? ?????? ????', $d->diffForHumans($d2));
            $scope->assertSame('1 ?????????? ???? ????', $d2->diffForHumans($d));

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 ?????????? ?????? ????', $d->diffForHumans($d2));
            $scope->assertSame('1 ?????????? ???? ????', $d2->diffForHumans($d));

            $scope->assertSame('1 ??????????', $d->diffForHumans($d2, true));
            $scope->assertSame('2 ??????????', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInFaroese()
    {
        Carbon::setLocale('fo');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 sekund s????an', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 sekundir s????an', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 minutt s????an', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 minuttir s????an', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('1 t??mi s????an', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 t??mar s????an', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('1 dag s????an', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 dagar s????an', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 vika s????an', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 vikur s????an', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 m??na??ur s????an', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 m??na??ir s????an', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 ??r s????an', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 ??r s????an', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('um 1 sekund', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 sekund aftan??', $d->diffForHumans($d2));
            $scope->assertSame('1 sekund ????renn', $d2->diffForHumans($d));

            $scope->assertSame('1 sekund', $d->diffForHumans($d2, true));
            $scope->assertSame('2 sekundir', $d2->diffForHumans($d->addSecond(), true));
        });
    }

    public function testDiffForHumansLocalizedInJapanese()
    {
        Carbon::setLocale('ja');

        $scope = $this;
        $this->wrapWithTestNow(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('1 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('1 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('1 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('1 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('1 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('1 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 ?????? ???', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('1 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 ??? ???', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('????????? 1 ???', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('1 ??? ???', $d->diffForHumans($d2));
            $scope->assertSame('1 ??? ???', $d2->diffForHumans($d));

            $scope->assertSame('1 ???', $d->diffForHumans($d2, true));
            $scope->assertSame('2 ???', $d2->diffForHumans($d->addSecond(), true));
        });
    }
}
