#3시간 10분 17초 동영상
#빈  자리는 빈 공간으로 두고 , 오른쪽 정렬을 하되 총 10자리 공간을 확보 
print('{0: >10}'.format(500)) #빈자리는 빈 공간으로 두고 오른쪽 정렬을 하되 총 10자리 공간을 확보 

# 양수일떈 +로 표시 음수일땐 -로 표시
print('{0: >+10}'.format(500))

#왼쪽 정렬하고 , 빈칸으로 _채움
print('{0:_<+10}'.format(500))

# 3자리마다 콤마를 찍어주기 
print('{0:,},{1}'.format(10000000000000,'3자리마다'))

# 3자리마 콤마 찍어주는데 +- 붙여주기

print('{0:+,}'.format(100000000000000))
print('{0:,}'.format(-100000000000000))

#돈이 많으면 행복하니깐 빈자리는 ^로 채워주기 
print('{0:^<+30,}'.format(1000000000000000000))

#소수점 출력 
print('{0:f}'.format(5/3))

#소수점의 특정자리까지만  출력 
print('{0:.2f}'.format(5/3))