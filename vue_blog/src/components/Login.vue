<template>
  <div class="login_container">
    <div class="login_box">
      <div class="login_logo">
        <img src="../assets/logo.png" alt="">
      </div>

      <el-form label-width="0px" class="login_form" :model="loginForm" :rules="rules" ref="loginRef">
<!--        用户名-->
        <el-form-item prop="email">
          <el-input v-model="loginForm.email" prefix-icon="el-icon-s-custom" placeholder="请输入邮箱"></el-input>
        </el-form-item>
<!--        密码-->
        <el-form-item prop="password">
          <el-input v-model="loginForm.password" prefix-icon="el-icon-lock" type="password" placeholder="请输入密码"></el-input>
        </el-form-item>
<!--        按钮-->
        <el-form-item class="login_button">
          <el-button type="primary" @click="login">登录</el-button>
          <el-button type="info" @click="reset">重置</el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      loginForm: {
        email: '',
        password: ''
      },
      rules: {
        email: [
          { required: true, message: '请输入邮箱', trigger: 'blur' }
        ],
        password: [
          { required: true, message: '请输入密码', trigger: 'blur' }
        ]
      }
    }
  },
  methods: {
    reset () {
      this.$refs.loginRef.resetFields()
    },
    login () {
      this.$refs.loginRef.validate(validate => {
        if (!validate) return false
        this.$http.get('admin/login', {
          params: {
            email: this.loginForm.email,
            password: this.loginForm.password
          }
        })
          .then((response) => {
            if (response.data.code === 200) return this.$message.success('登录成功')
            this.$message.error('登录失败')
          })
          .catch((error) => {
            console.log(error)
          })
      })
    }
  }
}
</script>
<style lang="less" scoped>
  .login_container {
    background-color: cadetblue;
    height: 100%;
  }
  .login_box {
    width: 450px;
    height: 300px;
    background-color: #ffffff;
    border-radius: 3px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  .login_logo {
    height: 130px;
    width: 130px;
    border: 3px solid #eeeeee;
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 0 10px #dddddd;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }
  }
  .login_button {
    display: flex;
    justify-content: flex-end;
  }
  .login_form {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 0 20px;
    box-sizing: border-box;
  }
</style>
