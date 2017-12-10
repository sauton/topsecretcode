::@ECHO OFF
CHOICE /C YN /T 10 /D Y /M "DANG O? MOKA?"
IF %ERRORLEVEL% == 1 goto moka
IF %ERRORLEVEL% == 2 goto nha

:moka
echo "o? moka"
netsh interface ipv4 set address name="Wireless Network Connection" static 192.168.1.163 255.255.255.0 192.168.1.100
::pause
::netsh interface ipv4 set dns name="Wireless Network Connection" source=dhcp
::pause
netsh interface ipv4 set dnsservers name="Wireless Network Connection" static 8.8.8.8 
::pause
netsh interface ipv4 add dnsservers name="wireless Network Connection" 8.8.4.4 index=2
::pause
goto end
:nha
echo "O? nha"
netsh interface ipv4 set address name="Wireless Network Connection" source = dhcp
::pause
::netsh interface ipv4 set dnsservers name="Wireless Network Connection" source=dhcp
netsh interface ipv4 set dnsservers name="Wireless Network Connection" static 8.8.8.8 
netsh interface ipv4 add dnsservers name="wireless Network Connection" 8.8.4.4 index=2
::pause
:end
echo "end"
