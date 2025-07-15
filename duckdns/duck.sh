echo url="https://www.duckdns.org/update?domains=basementdwell3r&token=7cdb3ffa-1a6f-4ce9-8fa0-7f013c8fef2b&ip=" | curl -k -o ~/duckdns/duck.log -K -
echo -e "\nIP address is now: $(curl -s -4 ifconfig.me)" >> ~/duckdns/duck.log
