<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100 flex flex-col">   
            @livewire('navigation-menu')
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="flex-grow">
                {{ $slot }}
            </main>

            @include('layouts.footer')
            
        </div>
            <div class="fixed bottom-20 right-10 flex flex-col items-center space-y-7 z-50">
                {{-- Zalo nhấp nháy nhẹ --}}
                <a href="https://zalo.me/0964098593" target="_blank"
                class="relative block transform hover:scale-110 transition duration-300">
                {{-- ping nền --}}
                <span class="absolute inset-0 rounded-full bg-blue-400 opacity-75 animate-ping"></span>
                <img src="data:image/png;base64,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"
                    alt="Zalo"
                    class="relative w-16 h-16 shadow-lg rounded-full" />
                </a>

                {{-- Điện thoại bounce nhẹ --}}
                <a href="tel:0964098593"
                class="relative block transform hover:scale-110 transition duration-300">
                    <span class="absolute inset-0 rounded-full bg-blue-400 opacity-75 animate-ping"></span>

                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOAAAADgCAMAAAAt85rTAAAAmVBMVEUAaP////8AZv8AX/8AZP8AYv8AXf8AYf8AWv8AWf/8///3+/8Aaf/6/f/0+f/V5P/v9f99qP8AbP/l7/+fvv/a6P+xyv/q8v8zff/F2P/L3f+VuP8kdv/P4P+Cq//w9v88hP+0zf9flv8Vcf+pxf9zof+kwf/H2v9Wj/9Hif9snf8uev+Msf85gP8kdf9xoP9akv+70/9kmf/XyLeEAAARP0lEQVR4nN1d6XqqOhSFTFBtna1ardWqrfOpff+HuyCBBAiQCbV33T/381TMIsmesveO49aMl07/7XVw3HzuTodVr+c4vd7qcNp9bo6D17d+56Xu33dqfPboe7DZzQAhEGKMEADAuSL4H4QwhpAQMNv9G0z6NQ6iJoIfb9MtgARiFLMSI6CKgz8D2+mkU89IaiDYmnQXmHiolFmGJ/KId+peRvZHY5vgcHBC4bzJk2MkMcGn6dDygKwSfD8efKhDjpGE/qH7bnNM9ggOjyvoGZBLSGK4mtubR0sEO+uFb4Md5ej544Gl/WiFYHvjEGSLXQQEwb5tY2zmBBuX3RO2NnkMAD+dlo37E1wfbE8eAyKzgSlFM4LNASI1TB4DgGjauh/BwapeehHF3tRkFg0IvvZg7fQiimCtT1Gb4Pe4/tlLKJLD5MYERz/1iRYRENlpuhx6BKceviW9ENg7aq1THYLvh9tsvjQAnL3dhODL3L/p6uQo+ptm/QTfZ/A+9EJ4K+VJVCTYON5r+iKAp7niTlQjODrdcfoiwIOaOFUiuIR3nb4ICK7rIjj37yA88wCkWwvBj/svzxhwLO8NSxNsr26u24uBetJxG1mCD7H9GAB5tUtwejvLWg6AHG0S7D4avwDknz2Cv+TebEQgPzI6X4bg7mHEZxpwIcGwmmBz4d2bSRG8U3W8ppJg4/Sw/AIncVx5vlhFsPnI/EKGVXNYRfBx12cEfKrYhxUEtw8qXxi8CklTTvD34fkFsvRHn2D3IfVfFuUav4zg9E/wCxiWWW0lBC8PaJ+JUWZ5FxNs3yM2qAdAir2nQoIfq4fyj8oBeoUecCHB0wP5t9XAY1WC3T+gIHjAojhNAcHXPyJAGfyCWJuY4OjvCJgYgIjjpWKCpz8kYGKgg9BmExI8/rENGAHOZQm+P917rHp4+pYj+HKudwOCihRL/QevBKdrAoL1agjgHRY9BGEduUPeRobgu2//lxkACNMJ+m+D3zMxSkwUws8v0jzBg64EBShA1ZC9abIT+l8/2PJEgllOkuYITjUXKCJo8fO5W5FyEy9tFjcvv8CqzwJznlOWYF/vlWL/8HpNum69f5YmmJBswktnfSD2phHArLrPEvzRsbEx/ORSH9uzkmegXfYVB7v+B1uz7HH2+RmC3xo2KHjapjM7W+OS8eLdJZ/O29/7tihml0iG4FhdwsB8mlVrVbLmECHk0H3tp8XB6NPS+VzWYksTVHciAOkKTMAqVQMwIePNJPXN95MdcUPSbkWa4LPqT6BnkXkkZc0GJNH+m+e4fraxTgFIvbcUwYGqivAKD8ul/BGA/dmUq3jpfNqYRDjlB8ITLN06wkdtC6PKbUl7CEC04ST7KzbfiaDHn1fwBAeKO9DbFtEL0JU91AiWKkexbyGXIzWFPEFF0xAdylLjPnryT8N4zl763niZAswtLI7gl9oEAlyerKKyoQEES24cpgzhQESwMVN7LqnKqFLy+gDZJtLmYhoRAmd2LsoIXtQmUGRzpSFcEcWeIMZJAL7tGIoaLpbPCC7UHvpUWXjTEuxC8rMe/Dv4wupCwI6Jhs9mDBGLAycE22qBmOoJDLR9TpB6kTfTeDuekMA0Y6mS/Z4ZQz/xyhKC/9SsCHKpJjjKrlFevPW/FvmSJ+TEAxuaxW3wb5Zgx1F6oDC+k8M2Mw1glvrn/tzJihMA493TNopnABCL+JjgWk2/Yqk8qqzcAijzBx+D5wxFkITgJ0bZqYmmiAkqxrLhUoZgMytmvFxEoTlF6b0BSDw0Rb2cRiJmKMGhYiit4CAgi312Y8PdNOvvjn4ziv0pnkOj+KXfThHMC7xSACjFz13mhog8glef65QRNOmlfh2QJf0HkyMSPE8RVPQjwFmO4EgkKUBYa71bf7A/a+5T+w0QWh0xUvZPuYesGhzBd8XFIKMFrzgUjRCRZ95NStufwKH/tDQIQsM3juBcMWELlTlKPLrF2jXwdn8ZxXbKdkEzakz+088kw12OYOGLLoA0wdfSpRG4SYnm75/5dwGpohaZe5Kg2+hKUFWGOmghSbDiyQA+JxZRMxVsJF/Rp4ouAI9Ijl4JKofrwUqSYLOqewAgm3gSU+FUgOjy1YpEXxEdg1wJqotjIkmwUX3WCGexYmzy5z7oFH3Y126wEOn6kOCHutlHZJtN7KrfHUJx6LHD+xDxItU+T49CDiFBjXUuXSD1kxKO1xY6+ZEILezYXm5pK8OrxxMSLJHlRUCfkgR5Yw2PL++v3QXJHT+BxDrjFV/s8uge6Dl4Qwkq+vLXIfU+ChgVEwRUuXVed9m+LKxSh7c/qTnZ1J3C6zYOCHZ0judka4c4l5Bb1v05SGtw8BSf4HDHP7G21Z5C2LkS1DkyS4RcBV64t58KAnQypc4AUbE15EIn1CYd6Xr34S86YVG8zperg04h+OAoTudADHepF4viGMGcfSU2eTeaujB0P518YEEOUj79MKWAvEwc55jyITwqt5qcZ+NH06oYEEsQviBHMUCbIDE1SnBJPxqQ03HJf+sN8O82jiQv2czGglTTMQxDJI470tzC6VMqEb1dLgYfuLvwxB2YDXnNDgD9BxZij3Xhl+4Y+wFBLRkT/rhTWpGxLOoUFGj7fTKNIz5xGtNFyhkeNHbU1wyxkUlAUPnUM/l2iTUT0CseEsAs+NTnw5VxEg1TFXHsSMLiEyFYZY62iMpGOXl0K0J+AB5iY/aNixvGUpOLYVIxo7lG8T4gqPlyAiTBoSwkTlJRIlL56CDNNXthwommfvX15Gjgtzoviqdm/NcLUt1bMjuGWWdbtoTiKWTWcfwbqqfr9EfOTadjcAjgiw8o5JJRwBNdALyhQt0wdsIfayMNhyD8Nu44fYP4cYG9JnmOAzA1hjhbM45msmVFJ1qzDMAfOm8mAXLxLpTd1eCZxs5YZCk+1Jkn74haTH09KUMmTj74rAB0EBH8lBVbHjX3ODlDIjHDlDOINmFTL88arh1tNRiNR+Q1yT+SugtccJBGM1tMPZIoAUPPYvamztEofUoYXutLRyHj8CMTIaAXfcKsT/oS9KQMPjraej4C/BIw/JV+Jj1q5vKi/EhqsvdOf6E8hFwEtHekN4wY6bwpiqF0qC82P5lfTOUW40MXrZ7JjLaOviETQVhvIp/HRT0Ito6oomAhcRq4GGoRBAvnZJpWJDoLbUlbD7kJo3yaTIzOMh+oABwc1XOXHLAogriWHQ6NY7D5AVHGbiOxzWKxo7UHwdnRM/J4EFFOrOzKp8YQS90DvWjRJmIUOFGEUu+cqRf8Zwqhtpc9sALgas00koUUG5+J3os/0F1q5gQdMhAwlC3C9zuZGad7OlE1AA/TU3p7AEeUWCk5IOrRMkOFfsBC4pSgRvzdGrConYRkmSyJXAqmjukHzCXx2kq7OgsLSzR466IOtXIeDuXzkyVobQatEAQrUWeevYy690eZJUp93l9bBM3VRAihPfMi00wBNjPD9wqk6FhTTRgr+ghEdFQh0Q6DOr3M3YslVk4Pas1EoOiNTbUI4iJvifBatCKHyWoG5+uUcpbMc/RkrRq8wFQzNbZj5EsTrzupchuicTBBH1yoNzJtXpjtRl1OXWPb0F1iELY8eakumEXg9xOxv6JVqu2EDw0l6gXHAnfJ0OHlniUMdA+rVxZIXxETZSQwqUrN8Xc9gnvDkAUPcUMQ9Xw6Mv9ect3OqIOoFxzDc8OgU3pkwob06p2vMOEz8mlYTW8reVNHL9YhBMDCNnU7wzXibVpuc643TLg2C/xmILRJDTJ5KLzeYqU5DWRiFLrPP0/kOLlt0zJyoF1i4A+NDl/yIxHnsL3eq71JePhicHwmAJoJC0bmd+qgFB6fGRyAiuD9igi6P/dpchkegKoWLVWBiELdbkO7BYgRrkfYFhVhCACFKVCjgqAYgkTtJj8lXJMQJpb3BxLXbQldJ0DGg8tluvDst5a5glwCgppHi8XA4pT8SZ4hiIs+W69bKzffZXFNBNJM5SpBQTvM11zqzBN3xt+fQ+vN3AA2SMYrg78UMlxnGJJ0MtjL9NmyrKXJeHrplGWIY7VZpAt4vJxh1+navXCFplPaljJOKGjEGc/8KkWiAq/hwuY6pQmxnRq2d64xDwUrkUdAnI75ZfFKLjiKktLriPpDQYuzEO2ophXAXlHlxXBsS6xfs6Q0ywqqQQrSSVvHGXmCh7JbBf9ZatSVlBUYFECVoECUBmZbs1VRwj2w1BtoSQl+1NGGzwGe/n26FxsjYqU9NR29sVp2dZhV0dPfvx7M6pXXyQGd9S/wHqo1LhAhSivWK5CUhMR1EDXOIVcgqX3+XQUsc2lJEUNDlQ/ODUZwXoeiCFFxlUAplmbCPVWkrFpmLg8iDmFIwewygVSZuWZKtAyUbmLLYGuwsECPbxSg2upBBQYMRwailK5Q3WYdKiDC9tBSMJANmWYdtabZ6DPUSzEMAeL0q5igbvmTFHzJi9jy0A6n5BrmaFdZSkF7H+rmjuRbHuV721gFKXAPq6AbL8o3rdKuspQE1NOHujPoJ/f1ssZxNWfzlbTqLIGmnhA1jjO1jCrh7dTvedY9vBS2/lNt3qgMfFb2DzXtDz51jmu/afkUJg9UGGgqgEqPUh58eTHfQLWWyAUPBIV5GIWQLzBJAXjiBqp1Ofb8TwsLZYqw1rQfC1vgGjRQkoXKNc+6uQvpRiJmbag1QHbV93Ze8aHbgbO4DbVGI3EN4LOUqHkpa5hfBoCKG4nLF6yYAHlLCX4LXdMxkyRg3sxfHRIb8UX77lE0K2vmX8dRmghwXN7pI91FTgnZ1rXZCzVMwiAKQM9lLXS/9bs057ou5q5EqSMXQADgdwtN07l+b9jqK1Fudy0YXC2F9CYm54PVl9oENvetcpIAmS2zs9iY7ExOeGk0u5Sg+1brxVLp8ZDe5sJcjNbbfGaWhSAoMbr51WBphNeGrLbd43Q6/zwA02QgT9BnSkCwWV+YWwQAEPagh82vfAMrgRUoup7vhovUKp5EzpjwgkXNDPA7Q1zWICTYuInFZhnoIDxtFd8B2v8zt0QnULvk9A9eU1vUI+x/c9FwUei88KpoXX/zPhB37ikl2Kk/QGMPOpd9u+9/R9AkzfGVCNYey7eHsiaEJQQNsxxuh4Ic8WqC7uZPMIT7Mg6lBN3PP6AsSq+YqyLY2N2n5kgBeFGeD1dO0G2cHlwdVub7VRAsv5H1/sCHqobmVQT1Q+i3AC69AlGOoNs6Pew+xOPqhvTVBANJ86Cy1DtJ5NtKEHQbPw+pD+FWJp9YhuBjanxSqt8VCQZW24NZ3qDUPlMnGFjeD8UQVN5AqkrQfe89kLpAz8X+kS5Bt2OtaMoY7CpNmwSr+5/fCEApdVGFoPtqsbZPG0hcqW+FoNu//zJVWZ7qBN2GwemrDQC/q1gtpEjQdd90W7vYgNdTS3bTIeg2LZdKywP4e8ksKSOCwSTOrJf0y9CDK+Xp0yQYZircXOsjONeq1dMj6Pa3t9UYgOwUk2kNCbrupOxWF+v0ZhJXb1sm6Lrr7DXPddGD6Eu/ztKAoNuY9uqnCODzVD1d3w5B121Ncb0UAfSOkhcB1kIwwGBWn7hBZDXVL3O2RNB9WZ6e6sjXB9g/vJrSs0EwwPvegZanMZAsv9JObRmsEAy84a+Tb28aw8kbqDkNhbBEMEB7voJ2WlDAVVfq9kYp2CMYqI23+dk3apIGgOefN9/6Wi8PmwRDDKdjJLprV2rqCD4c9VuYiGGbYICPy+YE1drdAeQRMt4sLe07HjUQDNGZHHf4em9yeZJkmEsZ/tnueBnZXJgMNRG8oj+Z7hdn5JMwGzRgyt18CVCYJEp8fF7sp5caJi5BnQSvaHb6k/X0uN8uDmd6cUBvdVhs9/PpejLsmJiZUvgPZCv7Nu29iJkAAAAASUVORK5CYII="
                    alt="Gọi điện"
                    class="relative w-16 h-16 shadow-lg rounded-full" />
                </a>

                {{-- Facebook gently pulsing --}}
                <a href="https://www.facebook.com/cuong24102003/" target="_blank"
                class="relative block transform hover:scale-110 transition duration-300">
                <span class="absolute inset-0 rounded-full bg-blue-400 opacity-75 animate-ping"></span>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/600px-2023_Facebook_icon.svg.png"
                    alt="Facebook"
                    class="relative w-16 h-16 shadow-lg rounded-full" />
                </a>
            </div>


        @stack('modals')

        @livewireScripts
    </body>
</html>