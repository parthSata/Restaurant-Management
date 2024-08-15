<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <div
        className="flex flex-row justify-center items-center gap-5 h-screen w-full overflow-x-auto flex-wrap-reverse xl:flex-wrap">
        <form onSubmit={handleLogin}>
            <div className="border-black flex flex-col justify-center items-center">
                <div className="flex flex-col justify-center items-center">
                    <div className="border-black flex flex-col justify-center items-center">
                        <div className="flex flex-col justify-center items-center">
                            <img className="h-[80px] w-[80px]" src={Logo} alt="" />
                            <p className="text-[30px] font-semibold">Login</p>
                            <p className="text-[#A2A3A5] mt-0 text-[16px] font-semibold">Welcome Back!</p>

                            <div className="flex items-center">
                                <Input type="email" placeholder="Email Id"
                                    className="ml-2 p-6 text-[14px] focus:outline-none h-[50px] w-[320px] border-b hover:border-0 font-semibold"
                                    value={email} onChange={handleEmailChange} />
                                <img src={Email} className="h-[24px] ml-2 w-[24px]" alt="" />
                            </div>
                            {errors.email && <p className="text-red-600 text-xs">{errors.email}</p>}
                        </div>

                        <div className="flex items-center border-b">
                            <Input type="password" value={password} placeholder="Password"
                                className="ml-2 p-6 text-[14px] focus:outline-none h-[50px] w-[320px] hover:border-0 font-semibold"
                                onChange={handlePasswordChange} />
                            <img src={Person} className="h-[24px] ml-2 w-[24px]" alt="" />
                        </div>
                        {errors.password && <p className="text-red-600 text-xs">{errors.password}</p>}

                        <p className="font-semibold text-[#DF201F] self-end" onClick={handleForgotPassword}>
                            Forgot Password
                        </p>

                        <div className="flex justify-center flex-col m-4">
                            <Button className={`bg-red-600 h-[50px] w-[247px] rounded-3xl text-white text-[18px]
                                md:text-[22px] mt-5 ${isValidEmail ? "" : "cursor-not-allowed opacity-50" }`}
                                disabled={!isValidEmail || isLoading}>
                                LOGIN
                            </Button>
                        </div>
                        <ToastContainer position="top-right" autoClose={1000} pauseOnFocusLoss={false} limit={1} />
                    </div>
                </div>
                <div className="mt-4">
                    <p className="text-gray-400 text-lg">
                        Don’t Have an account?
                        <span className="text-[#161A1D] font-semibold">
                            <Link to="/register"> Register now?</Link>
                        </span>
                    </p>
                </div>
            </div>
        </form>

        <div className="flex justify">
            <img src={Online} className="h-full w-[425px] md:w-[435px] md:h-[400px]" alt="" />
        </div>
    </div>
</body>

</html>
