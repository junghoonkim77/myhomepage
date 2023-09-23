#pickle은 프로그램을 파일화 해서 다른 사람에게 주고 그 사람은 다시 피클을 이용해 가져다 쓸수 있는 것
import pickle
# profile_file = open('profile.pickle','wb')
# profile ={'이름':'김정훈','나이':47,'취미':['축구','골프','코딩']}
# print(profile)
# pickle.dump(profile,profile_file) #profile에 있는 정보를 file에 저장
# profile_file.close()

profile_file = open('profile.pickle','rb')
profile = pickle.load(profile_file)  #file에 있는 정보를 profile에 불러오기
print(profile)
profile_file.close()


